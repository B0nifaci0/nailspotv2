<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::create([
            'name' => 'sub-Arte'
        ]);

        Subcategory::create([
            'name' => 'sub-Living Art'
        ]);

        Subcategory::create([
            'name' => 'sub-Estructura'
        ]);
    }
}
