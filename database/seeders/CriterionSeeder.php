<?php

namespace Database\Seeders;

use App\Models\Criterion;
use Illuminate\Database\Seeder;

class CriterionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Criterion::create([
            'name' => 'Criterio 1'
        ]);

        Criterion::create([
            'name' => 'Criterio 2'
        ]);

        Criterion::create([
            'name' => 'Criterio 3'
        ]);
    }
}
