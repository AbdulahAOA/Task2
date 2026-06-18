<x-app-layout>

    <x-slot name="header">
        <h2>Edit Product</h2>
    </x-slot>

    <div class="p-6">

        <form
            action="{{ route('products.update', $product->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div>

                <label>Category</label>

                <select
                    name="category_id"
                    class="form-control"
                >

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->code }} - {{ $category->name_en }}
                        </option>

                    @endforeach

                </select>

            </div>

            <br>

            <div>

                <label>Name Arabic</label>

                <input
                    type="text"
                    name="name_ar"
                    class="form-control"
                    value="{{ old('name_ar', $product->name_ar) }}"
                >

            </div>

            <br>

            <div>

                <label>Name English</label>

                <input
                    type="text"
                    name="name_en"
                    class="form-control"
                    value="{{ old('name_en', $product->name_en) }}"
                >

            </div>

            <br>

            <div>

                <label>Description Arabic</label>

                <textarea
                    name="description_ar"
                    class="form-control"
                >{{ old('description_ar', $product->description_ar) }}</textarea>

            </div>

            <br>

            <div>

                <label>Description English</label>

                <textarea
                    name="description_en"
                    class="form-control"
                >{{ old('description_en', $product->description_en) }}</textarea>

            </div>

            <br>

            <div>

                <label>Status</label>

                <select
                    name="status"
                    class="form-control"
                >

                    <option
                        value="1"
                        {{ $product->status == 1 ? 'selected' : '' }}
                    >
                        Active
                    </option>

                    <option
                        value="2"
                        {{ $product->status == 2 ? 'selected' : '' }}
                    >
                        Inactive
                    </option>

                </select>

            </div>

            <br>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Update Product
            </button>

        </form>

    </div>

</x-app-layout>