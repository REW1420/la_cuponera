<?php

namespace App\Http\Controllers;

use App\Mail\Send_invoice_Mailable;
use App\Models\Clients;
use App\Models\Coupons;
use App\Models\Offers;
use App\Models\Payments;
use App\Models\Purchases;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;


class PaymentController extends Controller
{
    /**
     * Muestra un formulario para realizar un pago.
     *
     * 
     */
    public function showPaymentForm()
    {


        return view('payment.form');
    }

    /**
     * Procesa la información de pago enviada por el formulario.
     *
     * @param  \Illuminate\Http\Request  $request
     
     */




    public function processPayment(Request $request)
    {

        // Define los mensajes de validación personalizados
        $messages = [
            'card_number.required' => 'El número de tarjeta es obligatorio.',
            'card_number.digits' => 'El número de tarjeta debe tener :digits dígitos.',
            'card_holder.required' => 'El nombre del titular de la tarjeta es obligatorio.',
            'card_holder.string' => 'El nombre del titular de la tarjeta debe ser una cadena de caracteres.',
            'card_holder.max' => 'El nombre del titular de la tarjeta no puede tener más de :max caracteres.',
            'card_expiration.required' => 'La fecha de vencimiento de la tarjeta es obligatoria.',
            'card_expiration.date_format' => 'El formato de la fecha de vencimiento de la tarjeta debe ser Y-m.',
            'card_cvc.required' => 'El código CVC es obligatorio.',
            'card_cvc.digits' => 'El código CVC debe tener :digits dígitos.',
            'amount.required' => 'El monto es obligatorio.',
            'amount.numeric' => 'El monto debe ser un valor numérico.'
        ];

        // Realiza la validación
        $validator = Validator::make($request->all(), [
            'card_number' => ['required', 'digits:16'],
            'card_holder' => ['required', 'string', 'max:255'],
            'card_expiration' => ['required', 'date_format:Y-m'],
            'card_cvc' => ['required', 'digits:3'],
            'amount' => ['required', 'numeric']
        ], $messages);



        try {
            // Crea un nuevo pago utilizando el modelo Payment
            $payment = new Payments([
                'card_number' => $request->input('card_number'),
                'card_holder' => $request->input('card_holder'),
                'card_expiration' => $request->input('card_expiration'),
                'card_cvc' => $request->input('card_cvc'),
                'amount' => $request->input('amount')
            ]);

            if ($payment->save()) {
                // Redirigir al usuario con un mensaje de éxito
                $cart = session()->get('cart', []);



                foreach ($cart as $item) {
                    for ($i = 0; $i < $item['quantity']; $i++) {
                        $purchase = new Purchases([
                            'client_id' => Auth::id(),
                            'offer_id' => $item['id'],
                        ]);
                        $purchase->save();

                        $this->create_coupon($purchase->id, $item['expiration_date']);
                    }

                    $this->remove_offer_item($item['id'], $item['quantity']);
                }





                $this->send_invoice($cart, $request->input('amount'));
                session()->forget('cart');
                return redirect()->route('home')->with('success', 'Pago procesado correctamente.');
            }

        } catch (\Exception $e) {
            // Redirigir al usuario con un mensaje de error
            error_log($e->getMessage());
            return back()->with('errorMessage', 'Error procesando el pago: ' . $e->getMessage());
        }
    }

    private function create_coupon(int $purchase_id, $expiration_date)
    {
        $user = Auth::user();
        $client = Clients::where('user_id', $user->id)->first();
        error_log($client->dui);
        $coupon = new Coupons();
        $coupon->unique_code = $this->generate_random_code();
        $coupon->purchase_id = $purchase_id;
        $coupon->owner_id = $user->id;
        $coupon->owner_dui = $client->dui;
        $coupon->expiration_date = $expiration_date;
        $coupon->save();
    }

    private function remove_offer_item($offer_id, $quantity)
    {

        $offer = Offers::find($offer_id);


        if ($offer) {

            if ($quantity <= $offer->coupon_limit_quantity) {

                $offer->coupon_limit_quantity -= $quantity;
                $offer->save();
                return true;
            } else {

                return false;
            }
        } else {

            return false;
        }
    }


    private function generate_random_code()
    {
        return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);
    }

    private function send_invoice(array $cart, $total)
    {
        try {
            $user = Auth::user();
            Mail::to($user->email)->send(new Send_invoice_Mailable($cart, $total));
        } catch (\Exception $e) {
            error_log($e);
            return false;
        }
    }
}
