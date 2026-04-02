<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMatch extends Model
{
    protected $table = 'user_matches';

    protected $fillable = [
        'user_id',
        'match_id',
        'assigned_by',
    ];

    // 🔗 User relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Match relation
    public function match()
    {
        return $this->belongsTo(Matches::class);
    }

    // 🔗 Vendor who assigned
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'assigned_by');
    }

   
}