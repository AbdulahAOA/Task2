<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        Coupons
    </h2>
</x-slot>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>Coupons List</h3>

        <a
            href="{{ route('coupons.create') }}"
            class="btn btn-primary"
        >
            ➕ Create Coupon
        </a>

    </div>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered">

    <thead>
        
        <tr>
             
            <th>ID</th>
            <th>Code</th>
            <th>Category</th>
            <th>Type</th>
            <th>Value</th>
            <th>Usage Limit</th>
            <th>Used Count</th>
             <th>Actions</th>
            
        </tr>

    </thead>

  <tbody>

    @foreach($coupons as $coupon)

        <tr>

            <td>
                {{ $coupon->id }}
            </td>

            <td>
                {{ $coupon->code }}
            </td>
                            <td>

                    @if($coupon->category)

                        {{ $coupon->category->code }}
                        -
                        {{ $coupon->category->name_en }}

                    @else

                        All Categories

                    @endif

                </td>

            <td>
                {{ ucfirst($coupon->type) }}
            </td>

            <td>
                {{ $coupon->value }}
            </td>

            <td>
                {{ $coupon->usage_limit }}
            </td>

            <td>
                {{ $coupon->used_count }}
            </td>

            <td>

                <a
                    href="{{ route('coupons.edit', $coupon->id) }}"
                    class="btn btn-warning btn-sm"
                >
                    ✏ Edit
                </a>

                <form
                    action="{{ route('coupons.destroy', $coupon->id) }}"
                    method="POST"
                    style="display:inline;"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Delete this coupon?')"
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

</x-app-layout>