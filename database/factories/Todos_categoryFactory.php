<?php

namespace Database\Factories;

use App\Models\Todos_category;
use Illuminate\Database\Eloquent\Factories\Factory;

class Todos_categoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Todos_category::class;

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
