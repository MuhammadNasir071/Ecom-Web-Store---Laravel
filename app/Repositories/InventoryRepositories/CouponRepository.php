<?php

namespace App\Repositories\InventoryRepositories;

use App\Models\Coupon;
use App\Traits\UploadTrait;


class CouponRepository
{
    use UploadTrait;

    public function store($request)
    {
        // dd($request);
        Coupon::create([
            'name' => $request->name,
            'code' => ($request->code),
            'discount' => ($request->discount),
            'max_uses' => ($request->max_uses),
            'starts_at' => $request->starts_at,
            'expires_at' => $request->expires_at,
            'is_active' => $request->is_active ?? 0,
        ]);
    }

    public function update($request, $id)
    {
        $coupon = Coupon::find($id);
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->discount = $request->discount;
        $coupon->max_uses = $request->max_uses;
        $coupon->starts_at = $request->start_date;
        $coupon->expires_at = $request->end_date;
        $coupon->is_active = $request->is_active ?? 0;
        $coupon->save();
    }


    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        return $coupon->delete();
    }


}
