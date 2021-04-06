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
            'base_currency' => $this->faker->currencyCode(),
            'abount' => $this->faker->number(),
            'transaction_id' => Str::random(10),
            'details' => $this->faker->text(),
        ];
    }
}
