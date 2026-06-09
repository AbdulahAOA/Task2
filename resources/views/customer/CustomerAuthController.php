public function logout()
{
    Auth::guard('customer')->logout();

    return redirect()->route(
        'customer.register.form'
    );
}   