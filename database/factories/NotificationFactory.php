<?php

namespace Database\Factories;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text($maxNbChars = 20),
            'description' => $this->faker->text(),
            'impact' => $this->faker->randomElement($array = array('low', 'medium', 'high')), // ''low' => 'LOW', 'medium' => 'MEDIUM', 'high' => 'HIGH'],
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
