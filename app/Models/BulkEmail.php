<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class BulkEmail extends Model
{
   protected $fillable = [
    'email',
    'name',
    'status',
    'is_blocked',
    'error'
    ];
}

