<?php

declare(strict_types=1);

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BulkEmail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public Registration $registration,
        public string $emailSubject,
        public string $emailBody,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->emailSubject,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.bulk',
            with: [
                'registration' => $this->registration,
                'body' => $this->emailBody,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
