<x-app-layout>

    <x-slot name="header">
        <h2 class="text-white m-0">
            Our Products
        </h2>
    </x-slot>

    <div class="text-center mb-5">

    <h1 class="text-warning fw-bold">
        Welcome To Product Store
    </h1>

    <p class="text-light">
        Browse products and login to start shopping.
    </p>

    <a
        href="{{ route('customer.login') }}"
        class="btn btn-warning btn-lg"
    >
        Customer Login
    </a>

</div>

    <div class="container mt-4">

        <div class="row">

            @foreach($products as $product)

                <div class="col-md-4 mb-4">

                    <div class="card shadow-lg border-0 h-100">

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

                        <div class="card-body">

                            <h4 class="card-title fw-bold">
                                {{ $product->name_en }}
                            </h4>

                            <p class="text-muted">
                                {{ $product->description_en }}
                            </p>

                        </div>

                        <div class="card-footer bg-white border-0">

                            <a
                                href="{{ route('store.product', $product->id) }}"
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

</x-app-layout>