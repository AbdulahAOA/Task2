<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    public function registerForm()
    {
        return view('customer.register');
    }

    public function loginForm()
    {
        return view('customer.login');
    }

    public function register(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'phone' => 'required|unique:customers,phone',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6',

        ]);

        $customer = Customer::create([

            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        Auth::guard('customer')->login($customer);

        return redirect()->route('customer.home');
    }

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (
        Auth::guard('customer')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])
    ) {
        $request->session()->regenerate();

        return redirect()->route('customer.home');
    }

    return back()->withErrors([
        'email' => 'These credentials do not match our records.'
    ])->withInput();
}
    public function logout()
    {
        Auth::guard('customer')->logout();

        return redirect()->route('customer.login');
    }
}
