<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->get();

        return view(
            'coupons.index',
            compact('coupons')
        );
    }
                    public function create()
                    {
                        $categories = Category::where(
                            'status',
                            1
                        )->get();

                        $customers = Customer::all();

                        return view(
                            'coupons.create',
                            compact(
                                'categories',
                                'customers'
                            )
                        );
                    }

    public function store(Request $request)
    {
        $request->validate([

            'code' => [
                'required',
                'unique:coupons,code'
            ],

            'type' => [
                'required'
            ],

            'value' => [
                'required',
                'numeric'
            ],

            'usage_limit' => [
                'required',
                'integer'
            ],

        ]);

        Coupon::create([

            'code'        => strtoupper(
                $request->code
            ),

            'type'        => $request->type,

            'value'       => $request->value,

            'usage_limit' => $request->usage_limit,

            'expires_at'  => $request->expires_at,
            
            'status' => $request->status,
        
            'category_id' => $request->category_id,
            'customer_id' => $request->customer_id,
            ]);

        return redirect()
            ->route('coupons.index');
    }
    public function check(Request $request)
{
    $coupon = Coupon::where(
        'code',
        strtoupper($request->code)
    )->first();

    if (!$coupon) {

        return response()->json([
            'success' => false,
            'message' => 'Invalid coupon'
        ]);
    }
    if ($coupon->customer_id) {

    $customer = auth('customer')->user();

    if (
        !$customer ||
        $coupon->customer_id != $customer->id
    ) {

        return response()->json([
            'success' => false,
            'message' => 'This coupon is not assigned to you'
        ]);
    }
}

    if (!$coupon->status) {

    return response()->json([
        'success' => false,
        'message' => 'Coupon inactive'
    ]);

}
     if (
    $coupon->expires_at &&
    now()->gt($coupon->expires_at)
) {

    return response()->json([
        'success' => false,
        'message' => 'Coupon expired'
    ]);

}
    if (
        $coupon->used_count >=
        $coupon->usage_limit
    ) {

        return response()->json([
            'success' => false,
            'message' => 'Coupon already used'
        ]);
    }
    

 session([
    'coupon_id' => $coupon->id
]);

return response()->json([
    'success' => true,
    'coupon' => $coupon
]);
}
public function edit(Coupon $coupon)
{
    return view(
        'coupons.edit',
        compact('coupon')
    );
}
public function update(
    Request $request,
    Coupon $coupon
)
{
    $request->validate([

        'code' => 'required',

        'type' => 'required',

        'value' => 'required|numeric',

        'usage_limit' => 'required|integer',

    ]);

            $coupon->update([

            'code' => strtoupper(
                $request->code
            ),

            'type' => $request->type,

            'value' => $request->value,

            'usage_limit' => $request->usage_limit,

            'expires_at' => $request->expires_at,

            'status' => $request->status,

            'category_id' => $request->category_id,

        ]);

    return redirect()
        ->route('coupons.index');
}
public function destroy(
    Coupon $coupon
)
{
    $coupon->delete();

    return back();
}
}