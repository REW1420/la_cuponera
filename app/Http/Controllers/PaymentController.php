<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;  // Asegúrate de importar el modelo Payment

class PaymentController extends Controller
{
    /**
     * Muestra un formulario para realizar un pago.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPaymentForm()
    {
        return view('payment.form');  // Asegúrate de que la vista exista
    }

    /**
     * Procesa la información de pago enviada por el formulario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processPayment(Request $request)
    {
        // Validación de los datos de entrada
        $validated = $request->validate([
            'card_number' => 'required|digits:16',
            'card_holder' => 'required|string|max:255',
            'card_expiration' => 'required|date_format:Y-m',
            'card_cvc' => 'required|digits:3',
            'amount' => 'required|numeric'
        ]);

        try {
            // Crear un nuevo pago utilizando el modelo Payment
            $payment = new Payment([
                'card_number' => $validated['card_number'],
                'card_holder' => $validated['card_holder'],
                'card_expiration' => $validated['card_expiration'],
                'card_cvc' => $validated['card_cvc'],
                'amount' => $validated['amount']
            ]);

            if ($payment->save()) {
                // Redirigir al usuario con un mensaje de éxito
                return redirect()->route('home')->with('success', 'Pago procesado correctamente.');
            } else {
                throw new \Exception('Failed to save the payment.');
            }
        } catch (\Exception $e) {
            // Redirigir al usuario con un mensaje de error
            return redirect()->back()->with('error', 'Error procesando el pago: ' . $e->getMessage());
        }
    }
}
