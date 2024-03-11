<?php

namespace App\Http\Controllers;

use App\Models\AppLog;
use Inertia\Inertia;

class LogViewerController extends Controller
{
    public function show_logs_for_app($app_id)
    {
        $logs = AppLog::whereAppId($app_id)
            ->with('monitored_app')
            ->latest()
            ->paginate(30);

        return Inertia::render('Logs/Index', [
            'app_id' => $app_id,
            'logs' => $logs
        ]);
    }
}
