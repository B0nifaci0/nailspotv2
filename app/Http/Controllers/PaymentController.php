<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Resolvers\PaymentPlatformResolver;

class PaymentController extends Controller
{
    protected $paymentPlatformResolver;

    public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
        $this->middleware('auth');

        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }

    public function checkoutCourse(Course $course)
    {
        if ($course->students->contains(auth()->user()->id)) {
            return back();
        }
        return view('payment.courses.checkout', compact('course'));
    }

    public function pay(Request $request)
    {
       
        $paymentPlatform = $this->paymentPlatformResolver
            ->resolveService($request->payment_platform);
        session()->put('paymentPlatformId', $request->payment_platform);

        return $paymentPlatform->handlePayment($request);
    }

    public function approval()
    {
        if (session()->has('paymentPlatformId')) {
            $paymentPlatform = $this->paymentPlatformResolver
                ->resolveService(session()->get('paymentPlatformId'));

            return $paymentPlatform->handleApproval();
        }

        return redirect()
            ->route('profile.courses')
            ->withErrors('No se puede obtener la plataforma de pago.');
    }

    public function cancelled()
    {
        return redirect()
            ->route('profile.courses')
            ->withErrors('Pago cancelado');
    }
}
