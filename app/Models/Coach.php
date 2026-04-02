<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $table = 'coaches';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'speciality',
        'experience',
        'students_count',
        'rating',
        'status',
        'academy',
        'created_by'
    ];
}