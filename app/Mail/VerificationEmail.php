<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user_id;
    public $token;
    /**
     * Create a new message instance.
     */
    public function __construct(string $token)
    {

        $this->token = $token;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('cuido2022@gmail.com', 'La Cuponera'),
            subject: '¡Verifica tu correo electronico!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('email.send_verification')
            ->with(['password' => $this->token]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
