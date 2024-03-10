<?php

namespace App\Http\Controllers;

use App\Models\MonitoredApp;
use Auth;
use Illuminate\Http\Request;

class MonitoredAppsController extends Controller
{
    public function index()
    {
        return MonitoredApp::query()
            ->whereUserId(Auth::id())
            ->get();
    }

    public function store(Request $request)
    {
        return MonitoredApp::create([
            'name' => $request->name
        ]);
    }

}
