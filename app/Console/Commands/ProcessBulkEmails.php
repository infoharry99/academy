<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BulkEmail;
use App\Mail\BulkMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ProcessBulkEmails extends Command
{
    protected $signature = 'emails:process';
    protected $description = 'Process bulk emails directly';

    public function handle()
    {
        Log::info('Bulk email cron started');

        $emails = BulkEmail::whereIn('status', ['pending', 'failed'])
                    ->where('is_blocked', 0)
                    ->limit(100)
                    ->get();

        foreach ($emails as $record) {

            Log::info('Sending email to: ' . $record->email);

            try {
                

                Log::info('Email sent: ' . $record->email);
                $mailers = ['smtp1', 'smtp2', 'smtp3', 'smtp4', 'smtp5','smtp6'];
                
            
                foreach ($mailers as $mailer) {
                    try {
                        Mail::mailer($mailer)
                            ->to($record->email)
                            ->send(new BulkMail($record));
                
                        $record->update(['status' => 'sent', 'error' => null]);
                        Log::info("Email sent via $mailer");
                        break;
                
                    } catch (\Throwable $e) {
                        Log::error("SMTP $mailer failed: ".$e->getMessage());
                    }
                }
                Log::info('Email sent via '.$mailer.' to '.$record->email);

            } catch (\Throwable $e) {

                $record->update([
                    'status' => 'failed',
                    'error'  => $e->getMessage()
                ]);

                Log::error('Email failed: ' . $record->email);
                Log::error($e->getMessage());
            }
        }

        $this->info('Bulk emails processed.');
    }
}
