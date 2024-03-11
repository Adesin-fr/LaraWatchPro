<?php

use App\Models\AppLog;
use App\Models\MonitoredApp;
use App\Models\User;


it('records received logs from POST requests in the DB', function () {

    $this->actingAs(User::factory()->create());
    $app = MonitoredApp::factory()->create();

    $response = $this->withHeaders([
        'Authorization' => $app->api_token
    ])->post('/api/events/create', getLogTestData());

    $response->assertStatus(200);
    expect(AppLog::count())->toBe(1);
});

it('is attached to the app related to the token', function () {
    $this->actingAs(User::factory()->create());
    $app = MonitoredApp::factory()->create();

    $response = $this->withHeaders([
        'Authorization' => $app->api_token
    ])->post('/api/events/create', getLogTestData());

    $response->assertStatus(200);
    expect(AppLog::first()->app_id)->toBe($app->id);
});
