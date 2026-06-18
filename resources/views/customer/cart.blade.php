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
    @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif

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
                type="button"
                class="btn btn-warning btn-sm decrease-btn"
                 data-id="{{ $item->id }}"
                >
                -
            </button>

        </form>

       <strong
    class="quantity-text"
    data-id="{{ $item->id }}"
            >
    {{ $item->quantity }}
            </strong>

        <form
            action="{{ route('cart.increase', $item->id) }}"
            method="POST"
        >
            @csrf

            <button
                     type="button"
                class="btn btn-success btn-sm increase-btn"
             data-id="{{ $item->id }}"
            >
         +
            </button>

        </form>

    </div>

</td>
<td
    class="subtotal"
    data-id="{{ $item->id }}"
    data-price="{{ $item->price }}"
>
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
    <span
    class="text-success"
    id="cart-total"
>
    {{ $total }} JD
</span>

</h4>
<div class="mb-3">

    <label class="form-label">
        Coupon Code
    </label>

    <input
        type="text"
        id="coupon-code"
        class="form-control"
        placeholder="Enter Coupon"
    >

</div>

<button
    type="button"
    id="apply-coupon"
    class="btn btn-primary mb-3"
>
    Apply Coupon
</button>
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
<script>

document
    .querySelectorAll('.increase-btn')
    .forEach(button => {

        button.addEventListener('click', function () {

            fetch(
                '/cart/increase/' + this.dataset.id,
                {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            )
            .then(response => response.json())
            .then(data => {

               document
    .querySelector(
        '.quantity-text[data-id="' +
        button.dataset.id +
        '"]'
    )
    .innerText = data.quantity;

const subtotalCell = document.querySelector(
    '.subtotal[data-id="' +
    button.dataset.id +
    '"]'
);

const price = parseFloat(
    subtotalCell.dataset.price
);

subtotalCell.innerText =
    (price * data.quantity) + ' JD';

document
    .getElementById('cart-total')
    .innerText = data.total + ' JD';

                console.log(data);

                if (data.total) {

                    document
                        .getElementById('cart-total')
                        .innerText =
                        data.total + ' JD';
                  
                }

            });

        });

    });

document
    .querySelectorAll('.decrease-btn')
    .forEach(button => {

        button.addEventListener('click', function () {

            fetch(
                '/cart/decrease/' + this.dataset.id,
                {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            )
            .then(response => response.json())
          .then(data => {

    document
        .querySelector(
            '.quantity-text[data-id="' +
            button.dataset.id +
            '"]'
        )
        .innerText = data.quantity;

    const subtotalCell = document.querySelector(
        '.subtotal[data-id="' +
        button.dataset.id +
        '"]'
    );

    const price = parseFloat(
        subtotalCell.dataset.price
    );

    subtotalCell.innerText =
        (price * data.quantity) + ' JD';

    document
        .getElementById('cart-total')
        .innerText =
        data.total + ' JD';

});
        });

    });

document
    .getElementById('apply-coupon')
    .addEventListener('click', function () {

        fetch(
            '/coupon/check',
            {
                method: 'POST',
                headers: {
                    'Content-Type':
                        'application/json',
                    'X-CSRF-TOKEN':
                        '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    code: document
                        .getElementById(
                            'coupon-code'
                        )
                        .value
                })
            }
        )
        .then(response => response.json())
        .then(data => {

    if (!data.success) {

        alert(data.message);

        return;
    }

alert('Coupon Applied Successfully');

            });

          });

</script>
</body>

</html>

