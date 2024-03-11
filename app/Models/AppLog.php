<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function monitored_app(): BelongsTo
    {
        return $this->belongsTo(MonitoredApp::class, 'app_id');
    }

}
