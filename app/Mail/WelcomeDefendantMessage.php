<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Applicant; 
use App\Models\Defendant; 
use App\Models\Lawsuit; 



class WelcomeDefendantMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(Lawsuit $lawsuit, Defendant $defendant, Applicant $applicant)
    {
        $this->lawsuit = $lawsuit;
        $this->defendant = $defendant;
        $this->applicant = $applicant;
        

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notice of Hearing',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.WelcomeDefendantMessage',
            with:[
                'lawsuit' => $this->lawsuit,
                'defendant' => $this->defendant,
                'applicant' => $this->applicant,
                
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

    public function build()
    {
        return $this->markdown('mail.WelcomeDefendantMessage')
                    ->with([
                        'lawsuit' => $this->lawsuit,
                        'defendant' => $this->defendant,
                        'applicant' => $this->applicant,
                        
                    ]);
    }
}
