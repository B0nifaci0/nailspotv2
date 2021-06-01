<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact=Contact::create([
            'ubication'=>'Santa Maria Atrasquillo',
            'phone'=>'7291073097',
            'email'=>'pruebitas.test@gmail.com',
            'facebook'=>'https://www.facebook.com/NailspotTuPuntoDeEncuentro/',
            'instagram'=>'https://www.instagram.com/nailspotoficial/',
            'youtube'=>'https://www.youtube.com/channel/UCnRve8GiZBh7MA0kdYNG5iQ',
        ]);
    
    }
}
