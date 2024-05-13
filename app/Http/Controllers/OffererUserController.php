<?php

namespace App\Http\Controllers;

use App\Models\Offerer_companies;
use App\Models\Offers;
use App\Models\Purchases;
use App\Models\Rejected_reasons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffererUserController extends Controller
{
    public function index(Request $request) {
        $user = Auth::user();

        $company = Offerer_companies::where('email', $user->email)->first();

        $offers = Offers::where('company_id', $company->id)->get();

        $purchases = Purchases::join('offers as o', 'purchases.offer_id', '=', 'o.id')
            ->join('offerer_companies as of', 'o.company_id', '=', 'of.id')
            ->where('of.id', $company->id)
            ->get();

        $companyId = $company->id;

        $rejectedReasons = Rejected_reasons::whereIn('offer_id', function ($query) use ($companyId) {
            $query->select('id')
                ->from('offers')
                ->where('company_id', $companyId);
        })->get();

        return view('offerer.index', compact('user', 'company', 'offers', 'purchases', 'rejectedReasons'));
    }

    public function create_offert(Request $request) {
        $offer = new Offers();

        $offer->title = $request->title;
        $offer->regular_price = $request->regular_price;
        $offer->offer_price = $request->offer_price;
        $offer->start_date = $request->start_date;
        $offer->end_date = $request->finish_date;
        $offer->coupon_usage_limit_date = $request->limit_date;
        $offer->coupon_limit_quantity = $request->coupon_quantity;
        $offer->description = $request->description;
        $offer->other_details = $request->other_details;
        $offer->company_id = $request->company_id;
        $offer->status_id = 2;
        $offer->save();

        return back()->with(['success' => 'Oferta creada']);
    }
}
