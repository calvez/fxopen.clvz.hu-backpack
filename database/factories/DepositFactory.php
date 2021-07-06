<?php

namespace Database\Factories;

use App\Models\Deposit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DepositFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Deposit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'user_id' => $this->faker->numberBetween(1, 10),
            'transaction_type' => $this->faker->randomElement($array = array('deposit', 'withdraw')), // 'b'
            'base_currency' => $this->faker->randomElement($array = array('EUR', 'USD', 'JPY')), // 'b'
            'transaction_id' => Str::random(15),
            'amount' => $this->faker->numberBetween(1000, 20000),
            'status' => $this->faker->randomElement($array = array('Approved', 'Denied', 'Processing')), // 'b'
            'details' => $this->faker->text(),
        ];
    }
}
