<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Auteur;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $auteur;
    public $cart;
    public $total;

    /**
     * Create a new message instance.
     */
    public function __construct(Auteur $auteur)
    {
        $this->auteur = $auteur;

        // Calculate cart and total similar to facture method
        $this->cart = [];
        $this->total = 0;
        foreach ($auteur->commandenvs as $ligne) {
            $this->cart[] = [
                'libelle' => $ligne->produit->libelle,
                'prix' => $ligne->prix,
                'qttestock' => $ligne->qtte,
                'etat' => $ligne->etat,
            ];
            $this->total += ($ligne->prix * $ligne->qtte);
        }
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation de commande - Shop2Ncorporate',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order_confirmation',
            with: [
                'auteur' => $this->auteur,
                'cart' => $this->cart,
                'total' => $this->total,
            ],
        );
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
