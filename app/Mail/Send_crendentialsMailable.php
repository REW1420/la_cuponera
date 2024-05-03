<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Send_crendentialsMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $password;
    public $email;
    /**
     * Create a new message instance.
     */
    public function __construct(string $password, string $email)
    {
        $this->password = $password;
        $this->email = $email;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('cuido2022@gmail.com', 'La Cuponera'),
            subject: '¡Credenciales listas!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('email.send_credentials')
            ->with(['password' => $this->password, 'email' => $this->email]);
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
