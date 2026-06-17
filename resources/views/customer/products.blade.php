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
        Products
    </h2>

    <div class="row">

        @foreach($products as $product)

            <div class="col-md-4 mb-4">

                <div class="card shadow h-100">

                    <div class="card-body">
                            @if($product->images->count())

    <img
        src="{{ asset('storage/' . $product->images->first()->image) }}"
        class="card-img-top"
        style="height:250px;object-fit:cover;"
        alt="{{ $product->name_en }}"
    >

@else

    <img
        src="https://via.placeholder.com/400x250?text=No+Image"
        class="card-img-top"
        style="height:250px;object-fit:cover;"
        alt="No Image"
    >

@endif
                        <h5 class="fw-bold">
                            {{ $product->name_en }}
                        </h5>

                        <p class="text-muted">
                            {{ $product->description_en }}
                        </p>
                <a
            href="{{ route('customer.product', $product->id) }}"
                    class="btn btn-primary w-100"

              >

              View Product

                </a>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

</body>
</html>