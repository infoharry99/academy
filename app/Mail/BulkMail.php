<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use App\Models\EmailTemplate;
use App\Models\BulkEmail;

class BulkMail extends Mailable
{
    // ❌ NO TYPE HERE (important)
    protected $record;

    public function __construct(BulkEmail $record)
    {
        $this->record = $record;
    }

    public function build()
    {
        $template = EmailTemplate::first();

        // Fallback safety
        $subject  = $template->subject   ?? 'Notification';
        $fromMail = $template->from_mail ?? config('mail.from.address');
        $fromName = $template->from_name ?? config('mail.from.name');

        // Personalisation
        $userName = $this->record->name ?: 'there';

        $body = $template->body ?? 'Dear #user';

        $body = str_replace(
            ['#user', '{{user}}', '{{name}}'],
            ucfirst($userName),
            $body
        );

        $mail = $this->from($fromMail, $fromName)
            ->subject($subject)
            ->html($body);

        // Image attachment
        $imagePath = public_path('brochures.png');
        if (file_exists($imagePath)) {
            $mail->attach($imagePath, [
                'as'   => 'Nexteck-Brochure.png',
                'mime' => 'image/png',
            ]);
        }

        // PDF attachment
        $pdfPath = public_path('NexteckHealth.pdf');
        if (file_exists($pdfPath)) {
            $mail->attach($pdfPath, [
                'as'   => 'Nexteck Health.pdf',
                'mime' => 'application/pdf',
            ]);
        }

        return $mail;
    }
}
