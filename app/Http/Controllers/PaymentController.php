<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\CompetenceDetail;
use App\Models\Sale;
use App\Models\Course;
use App\Models\Subcompetence;
use App\Models\SubcompetenceUser;
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

    public function checkout($route, $type)
    {
        if ($route == "course") {
            $course = Course::findOrFail($type);
            if ($course->students->contains(auth()->user()->id)) {
                return back();
            }
            return view('payment.courses.checkout', compact('course'));
        }
        if ($route == "competence") {
            $competence = Competence::findOrFail($type);
            return view('payment.competences.checkout', compact('competence'));
        }
    }

    public function pay(Request $request)
    {
        $subcompetences = SubcompetenceUser::Where('competence_id', $request->competence)
            ->where('user_id', auth()->user()->id)->whereStatus(SubcompetenceUser::TEMPORARY)
            ->get();
        foreach ($subcompetences as $subcompetence) {
            $subcompetence->status = SubcompetenceUser::PENDING;
            $subcompetence->save();
        }
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
                $competence = Competence::findOrFail($request->item);
                $subcompetences = SubcompetenceUser::Where('competence_id', $competence->id)
                    ->where('user_id', auth()->user()->id)->whereStatus(SubcompetenceUser::PENDING)
                    ->get();
                foreach ($subcompetences as $subcompetence) {
                    $subcompetence->status = SubcompetenceUser::APROVED;
                    $subcompetence->save();
                }
                $id = $competence->id;
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
