<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class Send_invoice_Mailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    private $invoice_details;
    private $total;
    public function __construct(array $invoice_details, $total)
    {
        $this->invoice_details = $invoice_details;
        $this->total = $total;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('cuido2022@gmail.com', 'La Cuponera'),
            subject: 'Detalles de su compra',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('email.send_invoice')
            ->with(['details' => $this->invoice_details, "total" => $this->total]);
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
