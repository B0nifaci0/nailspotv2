<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Mail\PaymentApproved;
use App\Models\Competence;
use Illuminate\Support\Facades\Mail;

class WebhookController extends Controller
{

    public function __invoke(Request $request)
    {
        $sale = Sale::whereStripeId($request->data['object']['id'])->first();
        $sale->update([
            'status' => Sale::APPROVAL
        ]);
        if ($sale->saleable_type == Course::class) {
            $course = Course::find($sale->saleable_id);
            $course->students()->attach($sale->user_id);
            $mail = new PaymentApproved($sale);
            Mail::to($sale->user->email)->queue($mail);
        } elseif ($sale->saleable_type == Competence::class) {
            $competence = Competence::find($sale->saleable_id);
            $competence->students()->attach($sale->user_id);
            // $mail = new PaymentApproved($sale);
            // Mail::to($sale->user->email)->queue($mail);
        }
    }
}
