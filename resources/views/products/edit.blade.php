<x-app-layout>

    <x-slot name="header">
        <h2>Edit Product</h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('products.update', $product->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div>
                <label>Name Arabic</label>
                <input
                    type="text"
                    name="name_ar"
                    value="{{ old('name_ar', $product->name_ar) }}"
                >
            </div>

            <br>

            <div>
                <label>Name English</label>
                <input
                    type="text"
                    name="name_en"
                    value="{{ old('name_en', $product->name_en) }}"
                >
            </div>

            <br>

            <div>
                <label>Description Arabic</label>
                <textarea name="description_ar">{{ old('description_ar', $product->description_ar) }}</textarea>
            </div>

            <br>

            <div>
                <label>Description English</label>
                <textarea name="description_en">{{ old('description_en', $product->description_en) }}</textarea>
            </div>

            <br>

            <div>
                <label>Status</label>

                <select name="status">
                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>
            </div>

            <br>

            <button type="submit">
                Update Product
            </button>

        </form>

    </div>

</x-app-layout>