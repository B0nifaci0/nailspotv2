<?php

namespace Database\Seeders;

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
        $competences = Competence::factory(10)->create();

        foreach ($competences as $competence) {
            
            $sales = Sale::factory(4)->create([
                'saleable_id' => $competence->id,
                'saleable_type' => Competence::class
            ]);

            foreach ($sales as $sale) {
                $competence->students()->attach($sale->user->id);
            }
        }
    }
}
