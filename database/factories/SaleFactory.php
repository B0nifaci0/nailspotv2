<?php

namespace Database\Factories;

use App\Models\Sale;
use App\Models\User;
use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'coupon_id' => Coupon::all()->random()->id,
            'final_price' => $this->faker->randomNumber(3),
            'payment_platform_id' => 1
        ];
    }
}
