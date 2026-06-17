@php
use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html>

<head>

    <title>Customer Home</title>

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

        <div class="navbar-nav ms-auto align-items-center">

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
                  class="nav-link text-white"
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

    <div class="card shadow border-0">

        <div class="card-header bg-dark text-warning">

            Customer Dashboard

        </div>

        <div class="card-body">

            <h2>

                Welcome
                {{ Auth::guard('customer')->user()->name }}

            </h2>

            <hr>

            <p class="mb-0">

                Customer dashboard works successfully.

            </p>

        </div>

    </div>

</div>

</body>

</html>