<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use App\Models\Models\Utente;
use Illuminate\Queue\SerializesModels;

class EmailSmd extends Mailable
{
    use Queueable, SerializesModels;

    public $utente;
    public $consultas;
    public $consultasMedicas;

    public function __construct(Utente $utente, $consultas, $consultasMedicas)
    {
       $this->utente = $utente; 
       $this->consultas = $consultas; 
       $this->consultasMedicas = $consultasMedicas; 
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Rastreio (DCV)',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.emailsmd',
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
