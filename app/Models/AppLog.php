<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
        'codeExcerpt',
    ];

    protected $casts=[
        'codeExcerpt' => 'array'
    ];

}
