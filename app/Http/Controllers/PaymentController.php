<?php

namespace App\Http\Controllers;

use App\Models\Sale;
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

    public function approval(Request $request)
    {
        if (session()->has('paymentPlatformId')) {
            $paymentPlatform = $this->paymentPlatformResolver
                ->resolveService(session()->get('paymentPlatformId'));

            $course = Course::find($request->course);
            $course->students()->attach(auth()->user()->id);

            Sale::create([
                'user_id' => auth()->user()->id,
                'saleable_id' => $course->id,
                'saleable_type' => Course::class,
                'coupon_id' => $request->coupon ? $request->coupon : null,
                'final_price' => $request->value
            ]);

            return $paymentPlatform->handleApproval($request);
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
