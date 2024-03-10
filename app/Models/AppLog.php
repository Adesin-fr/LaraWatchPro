<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_id',
        'level',
        'message',
        'userId',
        'file',
        'line',
        'trace',
    ];
}
