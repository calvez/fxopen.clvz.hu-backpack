<?php

namespace Database\Factories;

use App\Models\Support_ticket;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class Support_ticketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Support_ticket::class;

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
            'time' => $this->faker->date(),
            'user_id' => $this->faker->numberBetween(1, 10),
            'support_ticket_category_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
