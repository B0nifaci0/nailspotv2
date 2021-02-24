<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {

        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|unique:coupons',
            'code' => 'required',
            'type' => 'required',
            'discount' => 'required'
        ]);

        $coupon = Coupon::create($request->all());
        return redirect()->route('admin.coupons.edit', $coupon)->with('info', 'El cupón se creo con exito!');
    }

    // public function show(Coupon $coupon)
    // {
    //     return view('admin.coupons.show', compact('coupon'));
    // }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    // public function update(Request $request, Coupon $coupon)
    // {
    //     $request->validate([
    //         'name' => 'required|unique:coupons,name,' . $coupon->id
    //     ]);
    //     $coupon->update($request->all());
    //     return redirect()->route('admin.coupons.edit', $coupon)->with('info', 'El cupón se actualizo exito!');
    // }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with('info', 'El cupón se elimino con exito!');
    }
}
