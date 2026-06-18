<x-app-layout>

```
<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        📂 Create Category
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

        <div class="card-header bg-primary text-white">
            Category Information
        </div>

        <div class="card-body">

            <form action="{{ route('categories.store') }}" method="POST">

                @csrf

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
                                    {{ old('parent_category_id') == $parentCategory->id ? 'selected' : '' }}
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
        Category Code
         </label>

         <input
        type="text"
        name="code"
        class="form-control"
        value="{{ old('code') }}"
        placeholder="ELEC"
        required
             >

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

                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    💾 Save Category
                </button>

            </form>

        </div>

    </div>

</div>
```

</x-app-layout>
