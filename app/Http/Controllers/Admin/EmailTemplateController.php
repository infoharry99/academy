<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;

class EmailTemplateController extends Controller
{
    public function edit()
    {
        $template = EmailTemplate::first();

        return view('admin.email-template.edit', compact('template'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        EmailTemplate::updateOrCreate(
            ['id' => 1],
            [
            'body'    => $request->body, 
            'subject'  => $request->subject,
            'from_mail'=> $request->from_mail,
            'from_name'=> $request->from_name,
            'active'   => true
            ]
        );

        return back()->with('success', 'Email body updated successfully');
    }
}
