<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Course;
use Illuminate\Http\Request;

class WebhookController extends Controller
{

    public function __invoke(Request $request)
    {
        $sale = Sale::whereStripeId($request->data['object']['id']);
        $sale->status = Sale::APPROVAL;
        $sale->save();
        $course = Course::find($sale->saleable_id);
        $course->students()->attach($sale->user_id);
    }
}
