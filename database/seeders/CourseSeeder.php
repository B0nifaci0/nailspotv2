<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Goal;
use App\Models\Sale;
use App\Models\Image;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\Requirement;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $model = Image::class;


    public function run()
    {
        $faker = Factory::create();
        $courses = Course::factory(10)->create();

        foreach ($courses as $course) {

            Review::factory(5)->create([
                'course_id' => $course->id
            ]);

            $course->image()->create([
                'imageable_id' => $course->id,
                'imageable_type' => Course::class,
                'url' => 'courses/' . $faker->image(public_path('storage/courses'), 400, 300, null, false)
            ]);

            Requirement::factory(4)->create([
                'course_id' => $course->id
            ]);

            Goal::factory(4)->create([
                'course_id' => $course->id
            ]);

            Lesson::factory(4)->create([
                'course_id' => $course->id
            ]);

            $sales = Sale::factory(4)->create([
                'saleable_id' => $course->id,
                'saleable_type' => Course::class,
            ]);

            foreach ($sales as $sale) {
                $course->students()->attach($sale->user->id);
            }
        }
    }
}
