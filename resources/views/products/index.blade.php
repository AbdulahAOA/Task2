<x-app-layout>

```
<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        📦 Products Management
    </h2>
</x-slot>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>Our Products</h3>

        <a href="{{ route('products.create') }}"
           class="btn btn-primary">
            ➕ Create Product
        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="row">

        @foreach($products as $product)

            <div class="col-md-4 mb-4">

                <div class="card shadow border-0 h-100">

                    <div class="card-body">

                        <h4 class="card-title">
                            {{ $product->name_en }}
                        </h4>

                        <p class="text-muted">
                            {{ $product->description_en }}
                        </p>

                    </div>

                    <div class="card-footer bg-white border-0">

                        <a href="{{ route('store.product', $product->id) }}"
                           class="btn btn-success btn-sm">
                            👁 View
                        </a>

                        <a href="{{ route('products.edit', $product->id) }}"
                           class="btn btn-warning btn-sm">
                            ✏ Edit
                        </a>

                        <form
                            action="{{ route('products.destroy', $product->id) }}"
                            method="POST"
                            style="display:inline;"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                            >
                                🗑 Delete
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>
```

</x-app-layout>
