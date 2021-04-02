<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Level;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Pedro Angel',
            'email' => 'pruebitas.test@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
            'level_id' => Level::all()->random()->id,

        ]);

        $user->assignRole('Admin');


        User::factory(100)->create();
    }
}
