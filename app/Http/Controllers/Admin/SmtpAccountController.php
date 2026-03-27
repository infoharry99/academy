<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SmtpAccount;

class SmtpAccountController extends Controller
{
    public function index()
    {
        $smtps = SmtpAccount::all();
        return view('admin.smtp.index', compact('smtps'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'host'       => 'required',
            'port'       => 'required',
            'username'   => 'required',
            'password'   => 'required',
            'from_email' => 'required|email',
            'from_name'  => 'required'
        ]);

        SmtpAccount::create($request->all());

        return back()->with('success', 'SMTP added');
    }
}
