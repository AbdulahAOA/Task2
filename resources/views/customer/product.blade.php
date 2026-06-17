<!DOCTYPE html>
<html>

<head>

    <title>{{ $product->name_en }}</title>

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

            <a class="nav-link text-white"
               href="{{ route('customer.home') }}">
                Home
            </a>

            <a class="nav-link text-white"
               href="{{ route('customer.products') }}">
                Products
            </a>

            <a class="nav-link text-white"
               href="{{ route('customer.cart') }}">
                My Cart
            </a>

            <a class="nav-link text-white"
               href="{{ route('customer.profile') }}">
                My Profile
            </a>

        </div>

    </div>

</nav>

<div class="container mt-4">

    <div class="card shadow-lg border-0">

        <div class="card-body">

            <h1 class="display-5 fw-bold">
                {{ $product->name_en }}
            </h1>

            <p class="text-muted mt-3">
                {{ $product->description_en }}
            </p>
 @if($product->images->count())

    <div class="card shadow border-0 mb-4">

        <div class="card-body">

            <img
                id="mainImage"
                src="{{ asset('storage/' . $product->images->first()->image) }}"
                class="img-fluid rounded shadow w-100"
                style="height:500px;object-fit:cover;"
            >

            <div class="row mt-3">

                @foreach($product->images as $image)

                    <div class="col-md-2 col-4 mb-3">

                        <img
                            src="{{ asset('storage/' . $image->image) }}"
                            class="img-fluid rounded border shadow-sm"
                            style="height:100px;width:100%;object-fit:cover;cursor:pointer;"
                            onclick="document.getElementById('mainImage').src=this.src"
                        >

                    </div>

                @endforeach

            </div>

        </div>

    </div>

@endif

        </div>

    </div>

    <div class="row mt-4">

        <div class="col-md-4">

            <div class="card shadow border-0 h-100">

                <div class="card-header bg-primary text-white">
                    🎨 Available Colors
                </div>

                <div class="card-body">

                    @foreach($product->colors as $color)

                        <span class="badge bg-primary fs-6 mb-2">
                            {{ $color->name_en }}
                        </span>

                    @endforeach

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow border-0 h-100">

                <div class="card-header bg-success text-white">
                    💰 Sizes & Prices
                </div>

                <div class="card-body">

                    @foreach($product->prices as $price)

                        <div class="d-flex justify-content-between mb-2">

                            <strong>
                                {{ $price->size->name_en }}
                            </strong>

                            <span class="badge bg-success">
                                {{ $price->price }} JD
                            </span>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow border-0 h-100">

                <div class="card-header bg-warning">
                    📦 Stock
                </div>

                <div class="card-body">

                    @foreach($product->variationQuantities as $variation)

                        <div class="mb-2">

                            <strong>
                                {{ $variation->color->name_en }}
                            </strong>

                            -

                            {{ $variation->size->name_en }}

                            <span class="badge bg-dark">
                                Qty: {{ $variation->quantity }}
                            </span>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

    <div class="mt-4">
        <div class="card shadow border-0 mt-4">

    <div class="card-header bg-dark text-white">

        Add To Cart

    </div>

    <form
    action="{{ route('cart.add', $product->id) }}"
    method="POST"
>
    @csrf
    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">
                Select Color
            </label>

            <select
                name="color_id"
                     class="form-select"
                        >
@foreach($product->colors as $color)

    <option value="{{ $color->id }}">
        {{ $color->name_en }}
    </option>

@endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Select Size
            </label>

            <select
                  name="size_id"
                    class="form-select"
                    >

 @foreach($product->prices as $price)

    <option value="{{ $price->size->id }}">
        {{ $price->size->name_en }}
        -
        {{ $price->price }} JD
    </option>

@endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Quantity
            </label>

         <input
          type="number"
          name="quantity"
           class="form-control"
           value="1"
            min="1"
          >

        </div>

       <button
    type="submit"
          class="btn btn-warning w-100"
                >
              Add To Cart
        </button>

                </form>

    </div>

</div>
        <a
            href="{{ route('store.home') }}"
            class="btn btn-secondary"
        >
            ← Back To Products
        </a>

    </div>

</div>
```

</body>
</html>
