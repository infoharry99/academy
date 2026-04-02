<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Vendor;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = [
        'user_id',
        'vendor_id',
        'star',
        'skill',
        'discipline',
        'fitness',
        'match_performance',
        'comment',
        'feedback_date',
    ];

    // 🔗 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Vendor (Coach)
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}