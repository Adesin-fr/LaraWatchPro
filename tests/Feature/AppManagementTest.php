<?php

use App\Models\MonitoredApp;
use App\Models\User;

beforeEach(function(){
    $this->withoutVite();
    $this->actingAs(User::factory()->create());
});

test('registered users can create a new app', function () {
    $response = $this->post('/apps', MonitoredApp::factory()->make()->toArray());

    $response->assertStatus(201);
});

it('assign a new token to created apps', function () {
    $response = $this->post('/apps', MonitoredApp::factory()->make()->toArray());

    $response->assertStatus(201);
    expect(MonitoredApp::first()->api_token)->not->toBeNull();
});

it('allows to list apps', function () {
    MonitoredApp::factory(2)->create();

    $response = $this->get('/apps');

    $response->assertStatus(200);
});

it('links apps to my user', function () {
    $response = $this->post('/apps', MonitoredApp::factory()->make()->toArray());

    $response->assertStatus(201);
    expect(MonitoredApp::first()->user_id)->toBe(Auth::id());
});
