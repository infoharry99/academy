<?php

namespace App\Jobs;
use App\Models\{BulkEmail, SmtpAccount};
use App\Services\SmtpService;
use App\Mail\BulkMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendBulkEmailJob implements ShouldQueue
{
    public function __construct(public BulkEmail $record) {}

    public function handle()
    {
        $record = BulkEmail::find($this->bulkEmailId);

        if (!$record || $record->status !== 'pending') {
            return;
        }

        try {
            Mail::to($record->email)
                ->send(new BulkMail());

            $record->update([
                'status' => 'sent',
                'error'  => null
            ]);

        } catch (\Throwable $e) {
            $record->update([
                'status' => 'failed',
                'error'  => $e->getMessage()
            ]);

            throw $e;
        }
    }

}
