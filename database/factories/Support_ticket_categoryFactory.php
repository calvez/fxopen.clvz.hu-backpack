<?php

namespace Database\Factories;

use App\Models\Support_ticket_category;
use Illuminate\Database\Eloquent\Factories\Factory;

class Support_ticket_categoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Support_ticket_category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($maxNbChars = 20),
        ];
    }
}
