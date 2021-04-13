<?php

namespace Database\Factories;

use App\Models\Timer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Timer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'started_at' => $this->faker->dateTimeThisMonth($max = 'now', $timezone = null),
            'stopped_at' => $this->faker->dateTimeThisMonth($max = 'now', $timezone = null),
            'location' => $this->faker->country(),
        ];
    }
}
