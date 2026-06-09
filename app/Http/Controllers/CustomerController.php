<?php

namespace App\Http\Controllers;

use App\Models\Customer;

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
}