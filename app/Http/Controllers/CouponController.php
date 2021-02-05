<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function check(Request $request)
    {
        $coupon = $request->promo;
        $amount = Coupon::where('coupon', $coupon)->pluck('amount')->first();
        if ($amount === null || empty($amount)) {
            return false;
        } else {
            return $amount;
        }
    }
}
