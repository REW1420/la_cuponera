<?php

namespace App\Http\Controllers;

use App\Mail\Send_invoice_Mailable;
use App\Models\Payments;
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

        // Verifica si hay errores de validación
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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
                $this->send_invoice($cart, $request->input('amount'));
                session()->put('cart', []);
                return redirect()->route('home')->with('success', 'Pago procesado correctamente.');
            } else {
                throw new \Exception('Failed to save the payment.');
            }
        } catch (\Exception $e) {
            // Redirigir al usuario con un mensaje de error
            error_log($e->getMessage());
            return back()->with('errorMessage', 'Error procesando el pago: ' . $e->getMessage());
        }
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
