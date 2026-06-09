@php
use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html>

<head>

    <title>My Profile</title>

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
                class="nav-link text-warning"
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

            <h4 class="mb-0">
                My Profile
            </h4>

        </div>

        <div class="card-body">

            <div class="mb-3">

                <strong>Name:</strong>

                <p class="mb-0">
                    {{ Auth::guard('customer')->user()->name }}
                </p>

            </div>

            <hr>

            <div class="mb-3">

                <strong>Phone:</strong>

                <p class="mb-0">
                    {{ Auth::guard('customer')->user()->phone }}
                </p>

            </div>

            <hr>

            <div class="mb-3">

                <strong>Email:</strong>

                <p class="mb-0">
                    {{ Auth::guard('customer')->user()->email }}
                </p>

            </div>

        </div>

    </div>

</div>

</body>

</html>