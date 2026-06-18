<x-app-layout>

```
<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        📂 Categories Management
    </h2>
</x-slot>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>Categories List</h3>

        <a href="{{ route('categories.create') }}"
           class="btn btn-primary">
            ➕ Create Category
        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th width="220">Actions</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($categories as $category)

                        <tr>

                            <td>
                                {{ $category->id }}
                            </td>
                             <td>
                                 {{ $category->code }}
                                </td>
                            <td>
                                {{ $category->name_en }}
                            </td>

                            <td>

                                @if($category->status == 1)

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('categories.edit', $category->id) }}"
                                   class="btn btn-warning btn-sm">
                                    ✏ Edit
                                </a>

                                <form
                                    action="{{ route('categories.destroy', $category->id) }}"
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

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>
```

</x-app-layout>
