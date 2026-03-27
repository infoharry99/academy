<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmtpAccount extends Model
{
    protected $fillable = [
        'mailer','host','port','username',
        'password','encryption','from_email',
        'from_name','active'
    ];
}
