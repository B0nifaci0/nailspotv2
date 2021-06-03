<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ubication'=>$this->faker->sentence,
            'phone'=>$this->faker->phoneNumber,
            'email'=>$this->faker->email,
            'facebook'=>$this->faker->url,
            'instagram'=>$this->faker->url,
            'youtube'=>$this->faker->url,
        ];
    }
}
