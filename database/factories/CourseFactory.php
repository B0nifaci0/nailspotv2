<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

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
            'status' => $this->faker->randomElement([Course::BORRADOR, Course::REVISION, Course::PUBLICADO]),
            'slug' => Str::slug($name),
            'price' => $this->faker->randomNumber(2),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'user_id' => User::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ];
    }
}
