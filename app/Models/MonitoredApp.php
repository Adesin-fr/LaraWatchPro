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

    public function app_logs()
    {
        return $this->hasMany(AppLog::class, 'app_id');
    }
    public function app_logs_errors()
    {
        return $this->hasMany(AppLog::class, 'app_id')->whereLevel('error');
    }

    protected static function booted()
    {
        parent::booted();

        self::creating(function (MonitoredApp $app) {
            $app->api_token = Str::random(64);
            $app->user_id = Auth::id();
        });

    }

}
