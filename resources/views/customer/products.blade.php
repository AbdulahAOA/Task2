<!DOCTYPE html>
<html>

<head>

    <title>Customer Products</title>

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
                class="nav-link text-warning"
                href="{{ route('customer.products') }}"
            >
                Products
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
        Products
    </h2>

    <div class="row">

        @foreach($products as $product)

            <div class="col-md-4 mb-4">

                <div class="card shadow h-100">

                    <div class="card-body">

                        <h5 class="fw-bold">
                            {{ $product->name_en }}
                        </h5>

                        <p class="text-muted">
                            {{ $product->description_en }}
                        </p>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

</body>
</html>