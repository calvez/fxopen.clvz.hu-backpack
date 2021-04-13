<?php

namespace Database\Factories;

use App\Models\Trading_account;
use Illuminate\Database\Eloquent\Factories\Factory;

class Trading_accountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trading_account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'account_number' => $this->faker->numberBetween(1111111, 1111999),
            'master_name' => $this->faker->name(),
            'sub_account_name' => $this->faker->name(),
            'base_currency' => $this->faker->randomElement($array = array('EUR', 'USD', 'JPY')), // 'b'
            'balance' => $this->faker->numberBetween(1000, 20000),
            'equity' => $this->faker->numberBetween(1000, 20000),
            'leverage' => $this->faker->randomElement($array = array('100', '200', '500')), // 'b'
        ];
    }
}
