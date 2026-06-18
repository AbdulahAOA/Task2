<?php

namespace App\Http\Controllers;
use App\Models\CartItem;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Coupon;
class CartController extends Controller
{
public function add(Request $request, Product $product)
{
   
    $customer = Auth::guard('customer')->user();

    $cart = Cart::firstOrCreate([

        'customer_id' => $customer->id

    ]);

    $selectedPrice = $product->prices()
        ->where('size_id', $request->size_id)
        ->first();
    
    $item = CartItem::where(
        'cart_id',
        $cart->id
    )->where(
        'product_id',
        $product->id
    )->where(
        'size_id',
        $request->size_id
    )->where(
        'color_id',
        $request->color_id
    )->first();

    if ($item) {

        $item->increment(
            'quantity',
            $request->quantity
        );

    } else {

        CartItem::create([

            'cart_id'    => $cart->id,
            'product_id' => $product->id,
            'color_id'   => $request->color_id,
            'size_id'    => $request->size_id,
            'price'      => $selectedPrice->price,
            'quantity'   => $request->quantity,

        ]);

    }

    return back();
}
  public function index()
{
    $customer = Auth::guard('customer')->user();

    $cart = Cart::with(
       'items.product.images',
        'items.color',
        'items.size'
    )->where(
        'customer_id',
        $customer->id
    )->first();

    return view(
        'customer.cart',
        compact('cart')
    );
}
public function remove(CartItem $item)
{
    $item->delete();

    return back();
}
public function increase(CartItem $item)
{
    $stock = $item->product
        ->variationQuantities()
        ->where('color_id', $item->color_id)
        ->where('size_id', $item->size_id)
        ->first();

    if ($stock && $item->quantity < $stock->quantity) {

        $item->increment('quantity');

    }

 $total = $item->cart->items->sum(function ($cartItem) {

    return $cartItem->price * $cartItem->quantity;

});

return response()->json([
    'success'  => true,
    'quantity' => $item->quantity,
    'total'    => $total,
]);
}

public function decrease(CartItem $item)
{
    if ($item->quantity > 1) {

        $item->decrement('quantity');

    } else {

        $item->delete();

    }
$cart = $item->cart;

$total = $cart->items->sum(function ($cartItem) {

    return $cartItem->price * $cartItem->quantity;

});
return response()->json([
    'success'  => true,
    'quantity' => $item->exists ? $item->quantity : 0,
    'total'    => $total,
]);
}
public function checkout()
{
    $customer = Auth::guard('customer')->user();

    $cart = Cart::with(
        'items'
    )->where(
        'customer_id',
        $customer->id
    )->first();

    if (!$cart || !$cart->items->count()) {

        return back()->with(
            'error',
            'Cart is empty'
        );
    }

    $total = $cart->items->sum(function ($item) {

        return $item->price * $item->quantity;

    });
     $coupon = null;

if (session()->has('coupon_id')) {

    $coupon = Coupon::find(
        session('coupon_id')
    );

    if ($coupon) {

        if ($coupon->category_id) {

            $categoryTotal = $cart->items
                ->filter(function ($item) use ($coupon) {

                    return $item->product->category_id
                        == $coupon->category_id;

                })
                ->sum(function ($item) {

                    return $item->price *
                           $item->quantity;

                });

        } else {

            $categoryTotal = $total;

        }

        if ($coupon->type === 'percent') {

            $discount =
                $categoryTotal *
                $coupon->value / 100;

        } else {

            $discount =
                $coupon->value;

            if ($discount > $categoryTotal) {

                $discount = $categoryTotal;

            }

        }

        $total = $total - $discount;

    }

}
   
    $order = Order::create([
     
        'customer_id' => $customer->id,
        'total'       => $total,
        'address' => $customer->address ?? 'No Address',
        'status'      => 'pending',

    ]);

    foreach ($cart->items as $item) {

        OrderItem::create([

            'order_id'   => $order->id,
            'product_id' => $item->product_id,
            'color_id'   => $item->color_id,
            'size_id'    => $item->size_id,
            'price'      => $item->price,
            'quantity'   => $item->quantity,

        ]);
   $stock = $item->product
    ->variationQuantities()
    ->where('color_id', $item->color_id)
    ->where('size_id', $item->size_id)
    ->first();

if ($stock) {

    $stock->decrement(
        'quantity',
        $item->quantity
    );

}
   
        }
if ($coupon) {

    $coupon->increment(
        'used_count'
    );

    session()->forget(
        'coupon_id'
    );

}

    $cart->items()->delete();

return redirect()
    ->route('customer.cart')
    ->with(
        'success',
        'Order created successfully. Total: '
        . $total . ' JD'
    );
}
}