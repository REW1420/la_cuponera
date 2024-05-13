<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Coupons;

class CouponController extends Controller
{
    public function index()
    {
        return view('clerk.coupons');
    }

    public function show(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string|max:255',
        ]);

        $couponCode = $request->input('coupon_code');

        // Buscar el cupón por su código único
        $coupon = Coupons::where('unique_code', $couponCode)->first();

        if (!$coupon) {
            return redirect()->route('coupons.index')->with('coupon_code_error', 'El código del cupón no existe.');
        }

        return view('clerk.couponshow', compact('coupon'));
    }

    public function redeem(Request $request)
    {
        $couponId = $request->input('coupon_id');

        // Buscar el cupón por su ID
        $coupon = Coupons::find($couponId);

        if (!$coupon) {
            return redirect()->route('coupons.index')->with('error', 'El cupón seleccionado no es válido.');
        }

        // Realizar la lógica de canje aquí

        // Actualizar el estado del cupón a canjeado
        $coupon->is_redeemed = true;
        $coupon->save();

        return redirect()->route('coupons.index')->with('success', '¡El cupón ha sido canjeado con éxito!');
    }
}
