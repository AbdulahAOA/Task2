<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();

        return view(
            'customer.index',
            compact('customers')
        );
    }

    public function cart(Customer $customer)
    {
        $cart = $customer->cart()
            ->with(
                'items.product.images',
                'items.color',
                'items.size'
            )
            ->first();

        return view(
            'customer.cart-details',
            compact(
                'customer',
                'cart'
            )
        );
    }

    public function updateProfile(Request $request)
    {
        $request->validate([

            'address' => [
                'required',
                'string',
                'max:255'
            ],

        ]);

        $customer = auth('customer')->user();

        $customer->update([

            'address' => $request->address,

        ]);

        return back()->with(
            'success',
            'Address updated successfully.'
        );
    }
}