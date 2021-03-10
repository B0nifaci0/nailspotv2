<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->word,
            'code' => $this->faker->word,
            'type' => $this->faker->randomElement([Coupon::VALOR, Coupon::PORCENTUAL]),
            'discount' => $this->faker->randomNumber(3),
        ];
    }
}
