<?php

namespace Database\Factories;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Portfolio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'base_currency' => $this->faker->randomElement($array = array('EUR', 'USD', 'JPY')), // 'b'
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'passport' => $this->faker->numberBetween(1111111, 1111999),
            'joined' => $this->faker->date($format = 'Y-m-d', $max = 'now')
        ];
    }
}
