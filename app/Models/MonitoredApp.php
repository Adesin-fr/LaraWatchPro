<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MonitoredApp extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected static function booted()
    {
        parent::booted();

        self::creating(function (MonitoredApp $app) {
            $app->api_token = Str::random(64);
            $app->user_id = Auth::id();
        });

    }

}
