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


class WelcomeApplicantMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $lawsuit;
    public $applicant;
    public $defendant;
    public $court;

    public function __construct(Lawsuit $lawsuit, Applicant $applicant, Defendant $defendant)
    {
        $this->lawsuit = $lawsuit;
        $this->applicant = $applicant;
        $this->defendant = $defendant;
       

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
            markdown: 'mail.WelcomeApplicantMessage',
            with:[
                'lawsuit' => $this->lawsuit,
                'applicant' => $this->applicant,
                'defendant' => $this->defendant,
                
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
        return $this->markdown('mail.WelcomeApplicantMessage')
                    ->with([
                        'lawsuit' => $this->lawsuit,
                        'applicant' => $this->applicant,
                        'defendant' => $this->defendant,
                        
                    ]);
    }
}
