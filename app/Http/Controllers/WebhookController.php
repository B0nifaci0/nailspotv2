<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class WebhookController extends Controller
{

    public function __invoke(Request $request)
    {
        // $sale = Sale::whereStripeId($request->data->object->id);
        // $sale->status = Sale::APPROVAL;
        // $sale->save();
    }
}
