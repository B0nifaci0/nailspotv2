<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::paginate(10);
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(CouponRequest $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons',
        ]);

        Coupon::create($request->all());
        return redirect()->route('admin.coupons.index')->with('info', 'El cupón se creo con exito!');
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    public function update(CouponRequest $request, Coupon $coupon)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code,' . $coupon->id
        ]);

        $coupon->update($request->all());
        return redirect()->route('admin.coupons.index')->with('info', 'El cupón se actualizo exito!');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with('info', 'El cupón se elimino con exito!');
    }
}
