<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogEventController;
use App\Http\Controllers\LogViewerController;
use App\Http\Controllers\MonitoredAppsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/apps', [MonitoredAppsController::class, 'index'])->name('apps.index');
    Route::get('/apps/create', [MonitoredAppsController::class, 'create'])->name('apps.create');
    Route::post('/apps', [MonitoredAppsController::class, 'store'])->name('apps.store');

    Route::get('/apps/{app_id}/view_logs', [LogViewerController::class, 'show_logs_for_app'])->name('apps.view_logs');

});

Route::post('/api/events/create', [LogEventController::class, 'store']);
