<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use PayPal\Api\Payer;
use App\Models\Coupon;
use App\Models\Course;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use App\Models\Competence;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('services.paypal.client_id'),
                config('services.paypal.secret'),
            )
        );
    }
    public function checkoutCourse(Course $course)
    {
        if ($course->students->contains(auth()->user()->id)) {
            return back();
        }
        return view('payment.courses.checkout', compact('course'));
    }

    public function checkoutCompetence(Competence $competence)
    {

        $this->authorize('level', $competence);

        if ($competence->students->contains(auth()->user()->id)) {
            return back();
        }
        return view('payment.competences.checkout', compact('competence'));
    }

    public function payCourse(Course $course, Request $request)
    {

        $coupon = Coupon::find($request->coupon);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($request->finalprice);
        $amount->setCurrency('MXN');

        $transaction = new Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.course.approved', [$course, $coupon]))
            ->setCancelUrl(route('payment.course.checkout', $course));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function payCompetence(Competence $competence, Request $request)
    {

        $coupon = Coupon::find($request->coupon);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($request->finalprice);
        $amount->setCurrency('MXN');

        $transaction = new Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.competence.approved', [$competence, $coupon]))
            ->setCancelUrl(route('payment.competence.checkout', $competence));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }



    public function approvedCourse(Request $request, Course $course, Coupon $coupon)
    {
        if ($coupon) {
            if ($coupon->type == 0) {
                $final_price = $course->price - $coupon->discount;
            } else {
                $final_price = $course->price - ($course->price * $coupon->discount / 100);
            }
        } else {
            $final_price = $course->price;
        }

        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);


        $payment->execute($execution, $this->apiContext);
        $course->students()->attach(auth()->user()->id);

        Sale::create([
            'user_id' => auth()->user()->id,
            'saleable_id' => $course->id,
            'saleable_type' => Course::class,
            'coupon_id' => $coupon->id ? $coupon->id : null,
            'final_price' => $final_price
        ]);

        return redirect()->route('course.status', $course);
    }

    public function approvedCompetence(Request $request, Competence $competence, Coupon $coupon)
    {
        if ($coupon) {
            if ($coupon->type == 0) {
                $final_price = $competence->price - $coupon->discount;
            } else {
                $final_price = $competence->price - ($competence->price * $coupon->discount / 100);
            }
        } else {
            $final_price = $competence->price;
        }

        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);


        $payment->execute($execution, $this->apiContext);
        $competence->students()->attach(auth()->user()->id);

        Sale::create([
            'user_id' => auth()->user()->id,
            'saleable_id' => $competence->id,
            'saleable_type' => Competence::class,
            'coupon_id' => $coupon->id ? $coupon->id : null,
            'final_price' => $final_price
        ]);

        return redirect()->route('competences.index');
    }
}
