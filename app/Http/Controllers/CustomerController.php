<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;
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
    public function addresses()
{
    $addresses = CustomerAddress::where(
        'customer_id',
        auth('customer')->id()
    )->get();

    return view(
        'customer.addresses',
        compact('addresses')
    );
}
public function createAddress()
{
    return view(
        'customer.address-create'
    );
}
public function storeAddress(Request $request)
{
    CustomerAddress::create([

        'customer_id' => auth('customer')->id(),

        'title' => $request->title,

        'address' => $request->address,

    ]);

    return redirect()
        ->route('customer.addresses')
        ->with(
            'success',
            'Address Added Successfully'
        );
}

public function deleteAddress(CustomerAddress $address)
{
    if (
        $address->customer_id !=
        auth('customer')->id()
    ) {

        abort(403);

    }

    $address->delete();

    return back()->with(
        'success',
        'Address Deleted Successfully'
    );
}
}