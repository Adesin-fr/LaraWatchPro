<?php

use App\Models\AppLog;
use App\Models\MonitoredApp;
use App\Models\User;

it('records received logs from POST requests in the DB', function () {

    $this->actingAs(User::factory()->create());
    $app = MonitoredApp::factory()->create();

    $response = $this->withHeaders([
        'Authorization' => $app->api_token
    ])->post('/api/events/create', [
        'level' => 'error',
        'message' => 'Class FooBar not found',
        'userId' => '01ham7pf764q5jwht4aj7h95pw',
        'file' => '/home/user/myfile.php',
        'line' => 54,
        'trace' => '#0  /thefile.php: FooController.php(54): theFunction()'
    ]);

    $response->assertStatus(200);
    expect(AppLog::count())->toBe(1);
});

it('is attached to the app related to the token', function () {
    $this->actingAs(User::factory()->create());
    $app = MonitoredApp::factory()->create();

    $response = $this->withHeaders([
        'Authorization' => $app->api_token
    ])->post('/api/events/create', [
        'level' => 'error',
        'message' => 'Class FooBar not found',
        'userId' => '01ham7pf764q5jwht4aj7h95pw',
        'file' => '/home/user/myfile.php',
        'line' => 54,
        'trace' => '#0  /thefile.php: FooController.php(54): theFunction()'
    ]);

    $response->assertStatus(200);
    expect(AppLog::first()->app_id)->toBe($app->id);
});
