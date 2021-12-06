<?php

namespace App\Http\Controllers;

use App\Models\Competence;
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

    public function checkout(Request $request)
    {
        if ($request->type == 0) {
            $course = Course::find($request->id);
            if ($course->students->contains(auth()->user()->id)) {
                return back();
            }
            return view('payment.courses.checkout', compact('course'));
        }
        if ($request->type == 1) {
            $competence = Competence::find($request->id);
            if ($competence->students->contains(auth()->user()->id)) {
                return back();
            }
            return view('payment.competences.checkout', compact('competence'));
        }
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

            if ($request->type == 0) {
                $course = Course::find($request->item);
                $id = $course->id;
                $course->students()->attach(auth()->user()->id);
                $type = Course::class;
            }
            if ($request->type == 1) {
                $competence = Competence::find($request->item);
                $id = $competence->id;
                $competence->students()->attach(auth()->user()->id);
                $type = Competence::class;
            }

            Sale::create([
                'user_id' => auth()->user()->id,
                'saleable_id' => $id,
                'saleable_type' => $type,
                'coupon_id' => $request->coupon ? $request->coupon : null,
                'payment_platform_id' => 1,
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
