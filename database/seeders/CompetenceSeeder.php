<?php

namespace Database\Seeders;

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
    }
}
