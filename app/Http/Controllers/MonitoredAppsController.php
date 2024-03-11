<?php

namespace App\Http\Controllers;

use App\Models\MonitoredApp;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MonitoredAppsController extends Controller
{
    public function index()
    {
        $apps = MonitoredApp::query()
            ->withCount('app_logs_errors')
            ->whereUserId(Auth::id())
            ->get();

        return Inertia::render('Apps/Index', compact('apps'));
    }

    public function create()
    {
        return Inertia::render('Apps/Create');
    }

    public function store(Request $request)
    {
        MonitoredApp::create([
            'name' => $request->name
        ]);

        return redirect(route('apps.index'));

    }

}
