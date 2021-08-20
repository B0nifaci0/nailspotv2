<?php

namespace App\Services;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Traits\ConsumesExternalServices;

class StripeService
{
    use ConsumesExternalServices;

    protected $key;

    protected $secret;

    protected $baseUri;

    public function __construct()
    {
        $this->key = config('services.stripe.key');
        $this->secret = config('services.stripe.secret');
        $this->baseUri = config('services.stripe.base_uri');
    }

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $headers['Authorization'] = $this->resolveAccessToken();
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function resolveAccessToken()
    {
        return "Bearer {$this->secret}";
    }

    public function handlePayment(Request $request)
    {
        $intent = $this->createIntent($request->value);

        Sale::create([
            'user_id' => auth()->user()->id,
            'saleable_id' => $request->course,
            'saleable_type' => Course::class,
            'coupon_id' => $request->coupon ? $request->coupon : null,
            'final_price' => $request->value,
            'status' => Sale::PENDING
        ]);

        return json_encode(array('client_secret' => $intent->client_secret));
    }

    public function createIntent($value)
    {
        return $this->makeRequest(
            'POST',
            '/v1/payment_intents',
            [],
            [
                'amount' => $value * 100,
                "currency" => "mxn",
                "payment_method_types" => ["oxxo"],
            ],
        );
    }
}
