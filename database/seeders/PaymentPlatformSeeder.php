<?php

namespace Database\Seeders;

use App\Models\PaymentPlatform;
use Illuminate\Database\Seeder;

class PaymentPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentPlatform::create([
            'name' => 'PayPal',
            'image' => 'img/payment-platforms/paypal.jpg'
        ]);

        // PaymentPlatform::create([
        //     'name' => 'Stripe',
        //     'image' => 'img/payment-platforms/stripe.jpg'
        // ]);

        PaymentPlatform::create([
            'name' => 'Payu',
            'image' => 'img/payment-platforms/payu.jpg'
        ]);
    }
}
