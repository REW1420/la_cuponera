<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class Cuido2022 extends Mailable
{
    public $message;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @param string $subject El asunto del correo electrónico.
     * @param string $message El contenido del mensaje del correo electrónico.
     */
    public function __construct(string $subject, string $message)
    {
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Definir el asunto del correo
        $this->subject($this->subject);

        // Utilizar la vista 'correo' para el contenido del correo
        return $this->view('email.email');
    }
}
