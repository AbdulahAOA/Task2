<!DOCTYPE html>
<html>

<head>

    <title>My Cart</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a
            class="navbar-brand text-warning fw-bold"
            href="{{ route('customer.home') }}"
        >
            Customer Panel
        </a>

        <div class="navbar-nav ms-auto">

            <a
                class="nav-link text-white"
                href="{{ route('customer.home') }}"
            >
                Home
            </a>

            <a
                class="nav-link text-white"
                href="{{ route('customer.products') }}"
            >
                Products
            </a>

            <a
                class="nav-link text-warning"
                href="{{ route('customer.cart') }}"
            >
                My Cart
            </a>

            <a
                class="nav-link text-white"
                href="{{ route('customer.profile') }}"
            >
                My Profile
            </a>

            <form
                action="{{ route('customer.logout') }}"
                method="POST"
                class="d-inline"
            >
                @csrf

                <button
                    type="submit"
                    class="btn btn-link nav-link text-danger text-decoration-none"
                >
                    Logout
                </button>

            </form>

        </div>

    </div>

</nav>

<div class="container mt-5">

    <h2 class="mb-4">
        My Cart
    </h2>

    @if($cart && $cart->items->count())

        <table class="table table-bordered">

            <thead>

                <tr>

    <th>Image</th>
    <th>Product</th>
    <th>Color</th>
    <th>Size</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Subtotal</th>
    <th>Action</th>

</tr>

            </thead>

            <tbody>

               @foreach($cart->items as $item)
<tr>


<td width="150">

    @if($item->product->images->count())

        <img
            src="{{ asset('storage/' . $item->product->images->first()->image) }}"
            class="img-fluid rounded"
            style="height:80px;width:80px;object-fit:cover;"
        >

    @endif

</td>

<td>

    <a
        href="{{ route('customer.product', $item->product->id) }}"
        class="text-decoration-none fw-bold"
    >
        {{ $item->product->name_en }}
    </a>

</td>
<td>
    {{ $item->color?->name_en ?? '-' }}
</td>

<td>
    {{ $item->size?->name_en ?? '-' }}
</td>

<td>
    {{ $item->price }} JD
</td>
<td>

    <div class="d-flex align-items-center gap-2">

        <form
            action="{{ route('cart.decrease', $item->id) }}"
            method="POST"
        >
            @csrf

            <button
                type="submit"
                class="btn btn-warning btn-sm"
            >
                -
            </button>

        </form>

        <strong>
            {{ $item->quantity }}
        </strong>

        <form
            action="{{ route('cart.increase', $item->id) }}"
            method="POST"
        >
            @csrf

            <button
                type="submit"
                class="btn btn-success btn-sm"
            >
                +
            </button>

        </form>

    </div>

</td>
<td>
    {{ $item->price * $item->quantity }} JD
</td>
<td>

    <form
        action="{{ route('cart.remove', $item->id) }}"
        method="POST"
    >

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="btn btn-danger btn-sm"
        >
            Remove
        </button>

    </form>

</td>


                                    </tr>


                @endforeach

            </tbody>

        </table>

    @else

        <div class="alert alert-warning">

            Cart is empty

        </div>

    @endif
@if($cart)

@php

$total = $cart->items->sum(function ($item) {

    return $item->price * $item->quantity;

});

@endphp

<div class="text-end mt-3">

@if(isset($total))

<h4>

    Total:
    <span class="text-success">
        {{ $total }} JD
    </span>

</h4>

<form
    action="{{ route('checkout') }}"
    method="POST"
>
    @csrf

    <button
        type="submit"
        class="btn btn-success"
    >
        Checkout
    </button>

</form>

@endif
</div>

@endif


</div>

</body>

</html>