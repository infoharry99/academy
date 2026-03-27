<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BulkEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\BulkMail;


class BulkEmailController extends Controller
{
    public function index()
    {
        $emails = BulkEmail::latest()->get();
        $counts = [
            'total'   => BulkEmail::count(),
            'pending' => BulkEmail::where('status', 'pending')->count(),
            'sent'    => BulkEmail::where('status', 'sent')->count(),
            'failed'  => BulkEmail::where('status', 'failed')->count(),
            'blocked' => BulkEmail::where('is_blocked', 1)->count(),
        ];
        return view('admin.bulk-emails.index', compact('emails', 'counts'));
    }
    
    public function sendTestMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
    
        Mail::to($request->email)->send(new BulkMail());
    
        return back()->with('success', 'Test email sent to '.$request->email);
    }
    public function indexs()
    {
        return view('welcome');
    }

    public function toggleBlock($id)
    {
        $email = BulkEmail::findOrFail($id);
    
        $email->update([
            'is_blocked' => !$email->is_blocked,
            // optional: reset status when unblocking
            'status' => $email->is_blocked ? 'pending' : $email->status
        ]);
    
        return back()->with(
            'success',
            $email->is_blocked
                ? 'Email blocked successfully'
                : 'Email unblocked successfully'
        );
    }
public function store(Request $request)
{
    $request->validate([
        'emails' => 'required|string'
    ]);

    $items = array_map('trim', explode(',', $request->emails));

    foreach ($items as $item) {

        // Split email#name
        [$email, $name] = array_pad(explode('#', $item, 2), 2, null);

        $email = trim($email);
        $name  = $name ? trim($name) : null;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            BulkEmail::firstOrCreate(
                ['email' => $email],
                ['name' => $name]
            );
        }
    }

    return back()->with('success', 'Emails saved successfully');
}
    
    public function resetStatus($id)
    {
        $email = BulkEmail::findOrFail($id);
    
        $email->update([
            'status' => 'pending',
            'error'  => null
        ]);
    
        return redirect()->back()->with(
            'success',
            'Email status reset to pending'
        );
    }
    
    public function resetAll()
    {
        $count = BulkEmail::whereIn('status', ['sent', 'failed'])
            ->update([
                'status' => 'pending',
                'error'  => null
            ]);
    
        return redirect()->back()->with(
            'success',
            $count . ' emails reset to pending'
        );
    }
}
