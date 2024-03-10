<?php

namespace Database\Factories;

use App\Models\MonitoredApp;
use Illuminate\Database\Eloquent\Factories\Factory;

class MonitoredAppFactory extends Factory
{
    protected $model = MonitoredApp::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence
        ];
    }
}
