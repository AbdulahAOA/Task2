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
use App\Models\CustomerAddress;
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

 $addresses = CustomerAddress::where(
    'customer_id',
    $customer->id
)->get();

return view(
    'customer.cart',
    compact(
        'cart',
        'addresses'
    )
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
        $selectedAddress = CustomerAddress::where(
            'id',
            request('address_id')
        )
        ->where(
            'customer_id',
            $customer->id
        )
        ->first();

        if (!$selectedAddress) {

            return back()->with(
                'error',
                'Please select an address.'
            );

        }
   
   
  
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
    $originalTotal = $total;
    $discountAmount = 0;
    $discountPercent = 0;
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
                $discountPercent = $coupon->value;
        } else {

            $discount =
                $coupon->value;

            if ($discount > $categoryTotal) {

                $discount = $categoryTotal;

            }

        }
        $discountAmount = $discount;
        $total = $total - $discount;

    }

}
  foreach ($cart->items as $item) {

    $stock = $item->product
        ->variationQuantities()
        ->where('color_id', $item->color_id)
        ->where('size_id', $item->size_id)
        ->first();

    if (!$stock || $stock->quantity < $item->quantity) {

        return back()->with(
            'error',
            $item->product->name . ' does not have enough stock.'
        );

    }
}
   $order = Order::create([

    'customer_id' => $customer->id,
    'total' => $total,
    'address' => $selectedAddress->address,
    'status' => 'pending',

    'coupon_id' => session('coupon_id'),
    'original_total' => $originalTotal,
    'discount_amount' => $discountAmount,
    'discount_percent' => $discountPercent,
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

    $newQuantity = $stock->quantity - $item->quantity;

    $stock->update([
        'quantity' => max(0, $newQuantity)
    ]);

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
public function orders()
{
   $orders = \App\Models\Order::with(
    'customer',
    'coupon'
)
->latest()
->get();

    return view(
        'orders.index',
        compact('orders')
    );
}
public function orderDetails(\App\Models\Order $order)
{
    $order->load(
        'customer',
        'coupon',
        'items.product',
        'items.color',
        'items.size'
    );

    return view(
        'orders.details',
        compact('order')
    );
}
}