<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Sale;
use App\Models\Image;
use App\Models\Competence;
use Illuminate\Database\Seeder;

class CompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $competences = Competence::factory(10)->create();

        foreach ($competences as $competence) {
            
            $sales = Sale::factory(4)->create([
                'saleable_id' => $competence->id,
                'saleable_type' => Competence::class
            ]);

            $competence->image()->create([
                'imageable_id' => $competence->id,
                'imageable_type' => Competence::class,
                'url' => 'competences/' . $faker->image(public_path('storage/competences'), 400, 300, null, false)
            ]);
            foreach ($sales as $sale) {
                $competence->students()->attach($sale->user->id);
            }
        }
    }
}
