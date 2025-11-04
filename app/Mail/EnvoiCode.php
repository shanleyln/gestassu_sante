<?php

// Fichier : app/Mail/EnvoiCode.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnvoiCode extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Le code de vérification à envoyer.
     * La propriété doit être publique pour être automatiquement disponible dans la vue.
     * @var int
     */
    public int $code;

    /**
     * Crée une nouvelle instance du message.
     *
     * @param int $code Le code de vérification généré.
     */
    public function __construct(int $code)
    {
        $this->code = $code;
    }

    /**
     * Définit l'enveloppe du message (expéditeur, sujet, etc.).
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Votre code de vérification - INGENIUM-SANTE',
        );
    }

    /**
     * Récupère le contenu du message.
     * Nous utilisons `view` car votre template est en HTML pur, pas en Markdown.
     */
    public function content(): Content
    {
        // Le nom de la vue Blade à utiliser pour le corps de l'e-mail.
        // La variable publique `$code` sera automatiquement passée à cette vue.
        return new Content(
            view: 'emails.envoiEmailCode',
        );
    }

    /**
     * Récupère les pièces jointes du message.
     */
    public function attachments(): array
    {
        return [];
    }
}