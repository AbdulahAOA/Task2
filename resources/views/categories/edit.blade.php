<x-app-layout>

```
<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        ✏️ Edit Category
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

    <div class="card shadow border-0">

        <div class="card-header bg-warning">
            Category Information
        </div>

        <div class="card-body">

            <form
                action="{{ route('categories.update', $category->id) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Parent Category
                        </label>

                        <select
                            name="parent_category_id"
                            class="form-select"
                        >

                            <option value="">
                                Main Category
                            </option>

                            @foreach($parentCategories as $parentCategory)

                                <option
                                    value="{{ $parentCategory->id }}"
                                    {{ $category->parent_category_id == $parentCategory->id ? 'selected' : '' }}
                                >
                                    {{ $parentCategory->name_en }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select"
                        >

                            <option
                                value="1"
                                {{ $category->status == 1 ? 'selected' : '' }}
                            >
                                Active
                            </option>

                            <option
                                value="2"
                                {{ $category->status == 2 ? 'selected' : '' }}
                            >
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
                            value="{{ old('name_ar', $category->name_ar) }}"
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
                            value="{{ old('name_en', $category->name_en) }}"
                        >

                    </div>

                </div>

                <button
                    type="submit"
                    class="btn btn-warning"
                >
                    💾 Update Category
                </button>

            </form>

        </div>

    </div>

</div>
```

</x-app-layout>
