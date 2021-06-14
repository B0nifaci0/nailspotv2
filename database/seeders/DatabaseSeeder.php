<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\LevelSeeder;
use Database\Seeders\CouponSeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\CriterionSeeder;
use Database\Seeders\CompetenceSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\SubcategorySeeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Storage::makeDirectory('courses');
        Storage::makeDirectory('competences');
        Storage::makeDirectory('certificates');
        Storage::makeDirectory('course/tasks');

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CouponSeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(CriterionSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(CompetenceSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(PaymentPlatformSeeder::class);
        $this->call(CurrencySeeder::class);
    }
}
