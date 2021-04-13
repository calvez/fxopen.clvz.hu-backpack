<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'time' => $this->faker->date(),
            'title' => $this->faker->text($maxNbChars = 20),
            'description' => $this->faker->text(),
            'status' => $this->faker->randomElement($array = array('open', 'closed')), // 'b'
            'user_id' => $this->faker->numberBetween(1, 10),
            'todos_category_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
