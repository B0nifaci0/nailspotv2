<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Traits\ConsumesExternalServices;

class PayPalService
{
    use ConsumesExternalServices;

    protected $baseUri;

    protected $clientId;

    protected $clientSecret;

    public function __construct()
    {
        $this->baseUri = config('services.paypal.base_uri');
        $this->clientId = config('services.paypal.client_id');
        $this->clientSecret = config('services.paypal.client_secret');
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
        $credentials = base64_encode("{$this->clientId}:{$this->clientSecret}");

        return "Basic {$credentials}";
    }

    public function handlePayment(Request $request)
    {
        if ($request->type == 0) {
            $order = $this->createOrder($request->value, $request->course, $request->type, $request->coupon);
        }

        if ($request->type == 1) {
            $order = $this->createOrder($request->value, $request->competence, $request->type, $request->coupon);
        }

        $orderLinks = collect($order->links);

        $approve = $orderLinks->where('rel', 'approve')->first();

        session()->put('approvalId', $order->id);

        return redirect($approve->href);
    }

    public function handleApproval(Request $request)
    {
        if (session()->has('approvalId')) {
            $approvalId = session()->get('approvalId');
            $payment = $this->capturePayment($approvalId);
            if ($request->type == 0)
                return redirect()
                    ->route('profile.courses');
            if ($request->type == 1)
                return redirect()
                    ->route('profile.competences');
        }

        return back()
            ->withErrors('No se pudo realizar el Pago.');
    }

    public function createOrder($value, $item, $type, $coupon)
    {

        return $this->makeRequest(
            'POST',
            '/v2/checkout/orders',
            [],
            [
                'intent' => 'CAPTURE',
                'purchase_units' => [
                    0 => [
                        'amount' => [
                            'currency_code' => 'MXN',
                            'value' => $value,
                        ]
                    ]
                ],
                'application_context' => [
                    'brand_name' => config('app.name'),
                    'shipping_preference' => 'NO_SHIPPING',
                    'user_action' => 'PAY_NOW',
                    'return_url' => route('payment.approval', ['item' => $item, 'type' => $type, 'value' => $value, 'coupon' => $coupon]),
                    'cancel_url' => route('payment.cancelled'),
                ]
            ],
            [],
            $isJsonRequest = true,
        );
    }

    public function capturePayment($approvalId)
    {
        return $this->makeRequest(
            'POST',
            "/v2/checkout/orders/{$approvalId}/capture",
            [],
            [],
            [
                'Content-Type' => 'application/json',
            ],
        );
    }
}
