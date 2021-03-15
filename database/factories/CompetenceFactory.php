<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\Competence;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Competence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;

        return [
            'name' => $name,
            'description' => $this->faker->catchPhrase,
            'slug' => Str::slug($name),
            'price' => $this->faker->randomNumber(3),
            'start_date' => now()->format('m/d/Y'),
            'end_date' => now()->format('m/d/Y'),
            'url' => 'https://www.youtube.com/watch?v=PI3LAgGBxqU&ab_channel=QueenOfficial',
            'user_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'level_id' => Level::all()->random()->id,
            'subcategory_id' => Subcategory::all()->random()->id,
        ];
    }
}
