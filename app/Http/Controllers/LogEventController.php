<?php

namespace App\Http\Controllers;

use App\Models\AppLog;
use App\Models\MonitoredApp;
use Illuminate\Http\Request;

class LogEventController extends Controller
{
    public function store(Request $request)
    {
        $api_token = $request->header('Authorization');

        $app = MonitoredApp::firstWhere(['api_token' => $api_token]);
        if (!$app) {
            abort(403);
        }

        AppLog::create($request->all() + [
                'app_id' => $app->id
            ]);
    }
}
