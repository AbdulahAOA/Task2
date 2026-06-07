<x-app-layout>

```
<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        📦 Create Product
    </h2>
</x-slot>

<div class="container mt-4">

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

  <form
    action="{{ route('products.store') }}"
    method="POST"
    enctype="multipart/form-data"
>

        @csrf

        <div class="card shadow mb-4">

            <div class="card-header bg-primary text-white">
                Product Information
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Category
                        </label>

                        <select name="category_id"
                                class="form-select">

                            <option value="">
                                Select Category
                            </option>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}">
                                    {{ $category->name_en }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="1">
                                Active
                            </option>

                            <option value="2">
                                Inactive
                            </option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Name Arabic
                        </label>

                        <input
                            type="text"
                            name="name_ar"
                            class="form-control"
                            value="{{ old('name_ar') }}"
                        >

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Name English
                        </label>

                        <input
                            type="text"
                            name="name_en"
                            class="form-control"
                            value="{{ old('name_en') }}"
                        >

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Description Arabic
                        </label>

                        <textarea
                            name="description_ar"
                            class="form-control"
                            rows="3"></textarea>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Description English
                        </label>

                        <textarea
                            name="description_en"
                            class="form-control"
                            rows="3"></textarea>

                    </div>

                </div>

            </div>

        </div>

        <div class="card shadow mb-4">

            <div class="card-header bg-success text-white">
                🎨 Product Colors
            </div>

            <div class="card-body">

                @foreach($colors as $color)

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="colors[]"
                            value="{{ $color->id }}"
                        >

                        <label class="form-check-label">
                            {{ $color->name_en }}
                        </label>

                    </div>

                @endforeach

            </div>

        </div>

        <div class="card shadow mb-4">

            <div class="card-header bg-warning">
                💰 Sizes & Prices
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>

                        <tr>
                            <th>Size</th>
                            <th>Price</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($sizes as $size)

                            <tr>

                                <td>
                                    {{ $size->name_en }}
                                </td>

                                <td>

                                    <input
                                        type="number"
                                        step="0.01"
                                        class="form-control"
                                        name="prices[{{ $size->id }}]"
                                    >

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card shadow mb-4">

            <div class="card-header bg-danger text-white">
                📦 Product Quantities
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>

                        <tr>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Quantity</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($colors as $color)

                            @foreach($sizes as $size)

                                <tr>

                                    <td>
                                        {{ $color->name_en }}
                                    </td>

                                    <td>
                                        {{ $size->name_en }}
                                    </td>

                                    <td>

                                        <input
                                            type="number"
                                            class="form-control"
                                            name="quantities[{{ $color->id }}][{{ $size->id }}]"
                                        >

                                    </td>

                                </tr>

                            @endforeach

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>
<div class="mb-4">

    <label class="form-label fw-bold">
        Product Images
    </label>

    <input
    type="file"
    name="images[]"
    multiple="multiple"
    accept="image/*"
    class="form-control"
>

    <small class="text-muted">
        Select one or more images
    </small>

</div>
        <button
            type="submit"
            class="btn btn-primary btn-lg"
        >
            💾 Save Product
        </button>

    </form>

</div>
```

</x-app-layout>
