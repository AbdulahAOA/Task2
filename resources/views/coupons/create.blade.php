<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create Coupon
    </h2>
</x-slot>

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-dark text-white">
            Add Coupon
        </div>

        <div class="card-body">

            <form
                action="{{ route('coupons.store') }}"
                method="POST"
            >

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Coupon Code
                    </label>

                    <input
                        type="text"
                        name="code"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Type
                    </label>

                    <select
                        name="type"
                        class="form-control"
                        required
                    >

                        <option value="percent">
                            Percent %
                        </option>

                        <option value="fixed">
                            Fixed Amount
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Value
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="value"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Usage Limit
                    </label>

                    <input
                        type="number"
                        name="usage_limit"
                        value="1"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Expire Date
                    </label>

                    <input
                        type="date"
                        name="expires_at"
                        class="form-control"
                    >

                </div>
                 <div class="mb-3">

                    <div class="mb-3">

    <label class="form-label">
        Customer
    </label>

    <select
        name="customer_id"
        class="form-control"
    >

        <option value="">
            All Customers
        </option>

        @foreach($customers as $customer)

            <option value="{{ $customer->id }}">

                {{ $customer->name }}

            </option>

        @endforeach

    </select>

</div>
    <label class="form-label">
        Status
    </label>

    <select
        name="status"
        class="form-control"
    >

        <option value="1">
            Active
        </option>

        <option value="0">
            Inactive
        </option>

    </select>

</div>

<div class="mb-3">

    <label class="form-label">
        Category
    </label>

    <select
        name="category_id"
        class="form-control"
    >

        <option value="">
            All Categories
        </option>

        @foreach($categories as $category)

            <option value="{{ $category->id }}">

                {{ $category->code }}
                -
                {{ $category->name_en }}

            </option>

        @endforeach

    </select>

</div>
                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Save Coupon
                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>