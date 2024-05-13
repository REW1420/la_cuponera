<?php

namespace App\Http\Controllers;

use App\Models\Offerer_companies;
use App\Models\Offers;
use App\Models\Purchases;
use App\Models\Rejected_reasons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $id = $request->id;
        $offers = Offers::select('offers.*', 'categories.name as category_name')
            ->join('offerer_companies', 'offers.company_id', '=', 'offerer_companies.id')
            ->join('categories', 'offerer_companies.category_id', '=', 'categories.id')
            ->where('offers.status_id', 5)
            ->get();

        $company = Offerer_companies::select('commission')->get();

        $purchases = Purchases::join('offers as o', 'purchases.offer_id', '=', 'o.id')
            ->join('offerer_companies as of', 'o.company_id', '=', 'of.id')
            ->where('of.id', $id)
            ->get();
        $cart = session()->get('cart', []);

        $quantities = [];
        foreach ($cart as $item) {
            if (isset($item['quantity'])) {
                $quantities[] = $item['quantity'];
            }
        }

        $cartLength = array_sum($quantities);


        return view('client.index', compact('offers', 'purchases', 'company', 'cartLength'));
    }

    public function index_company_info(Request $request)
    {
        $id = $request->id;
        $offers = Offers::where('company_id', $id)->get();
        $company = Offerer_companies::select('commission')->where('id', $id)->get()->first();
        error_log($company);

        $purchases = Purchases::join('offers as o', 'purchases.offer_id', '=', 'o.id')
            ->join('offerer_companies as of', 'o.company_id', '=', 'of.id')
            ->where('of.id', $id)
            ->get();

        $companyId = $request->id;

        $rejectedReasons = Rejected_reasons::whereIn('offer_id', function ($query) use ($companyId) {
            $query->select('id')
                ->from('offers')
                ->where('company_id', $companyId);
        })->get();


        return view('admin.pages.company_info', compact(['offers', 'purchases', 'company', 'rejectedReasons']));
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);

        $total = 0;

        $quantities = [];
        foreach ($cart as $item) {
            if (isset($item['quantity'])) {
                $quantities[] = $item['quantity'];
            }
        }
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $cartLength = array_sum($quantities);


        $isEmpty = empty($cart);

        return view('client.cart', compact('cart', 'total', 'isEmpty', 'cartLength'));
    }


    public function addToCart(Request $request, $id)
    {
        $offer = Offers::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'expiration_date' => $offer->end_date,
                "id" => $offer->id,
                "title" => $offer->title,
                "quantity" => 1,
                "price" => $offer->offer_price
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Oferta agregada al carrito correctamente!');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            } else {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Producto eliminado del carrito.');
    }

    public function myCoupons()
    {
        $userId = auth()->id(); // Asegúrate de que el usuario está autenticado

        // Realizar la consulta con Query Builder
        $myCoupons = DB::table('offers')
            ->join('purchases', 'offers.id', '=', 'purchases.offer_id')
            ->join('coupons', 'purchases.id', '=', 'coupons.purchase_id')
            ->where('coupons.owner_id', '=', $userId)
            ->select('offers.*', 'purchases.*', 'coupons.*')
            ->get();
        $cart = session()->get('cart', []);

        $quantities = [];
        foreach ($cart as $item) {
            if (isset($item['quantity'])) {
                $quantities[] = $item['quantity'];
            }
        }

        $cartLength = array_sum($quantities);
        return view('client\my_cupons', compact('myCoupons', 'cartLength'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $offer = new Offers();
        $offer->title = $request->input('title');
        $offer->regular_price = $request->input('regular_price');
        $offer->offer_price = $request->input('offer_price');
        $offer->start_date = $request->input('start_date');
        $offer->end_date = $request->input('end_date');
        $offer->coupon_usage_limit_date = $request->input('coupon_usage_limit_date');
        $offer->description = $request->input('description');
        $offer->other_details = $request->input('other_details');
        $offer->status_id = $request->input('status_id');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'regular_price' => 'required',
            'offer_price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'coupon_usage_limit_date' => 'required',
            'coupon_limit_quantity' => 'required',
            'description' => 'required',
            'other_details' => 'required',
            'status_id' => 'required'
        ]);
        error_log($request->input('status_id'));
        Offers::find($id)->update($request->all());
        Offers::where('id', $id)->update(['status_id' => $request->input('status_id')]);
        return back()->with('success', "Oferta actualizada");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function get_offers_by_status_waiting()
    {
        $new_offers = Offers::where('status_id', 2)->get();
        return view('admin.pages.new-offers', compact('new_offers'));
    }

    public function set_approved_status(Request $request)
    {
        $offer_id = $request->input('id');
        $offer = Offers::find($offer_id);
        $offer->status_id = 1;
        $offer->save();
        return back()->with('success', "Oferta actualizada");
    }
}
