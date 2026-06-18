<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Coupon
    </h2>
</x-slot>

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header">
            Edit Coupon
        </div>

        <div class="card-body">

            <form
                action="{{ route('coupons.update', $coupon->id) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label>
                        Coupon Code
                    </label>

                    <input
                        type="text"
                        name="code"
                        class="form-control"
                        value="{{ $coupon->code }}"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>
                        Type
                    </label>

                    <select
                        name="type"
                        class="form-control"
                    >

                        <option
                            value="percent"
                            {{ $coupon->type == 'percent' ? 'selected' : '' }}
                        >
                            Percent
                        </option>

                        <option
                            value="fixed"
                            {{ $coupon->type == 'fixed' ? 'selected' : '' }}
                        >
                            Fixed
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>
                        Value
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="value"
                        class="form-control"
                        value="{{ $coupon->value }}"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>
                        Usage Limit
                    </label>

                    <input
                        type="number"
                        name="usage_limit"
                        class="form-control"
                        value="{{ $coupon->usage_limit }}"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>
                        Expire Date
                    </label>

                    <input
                        type="date"
                        name="expires_at"
                        class="form-control"
                        value="{{ $coupon->expires_at ? \Carbon\Carbon::parse($coupon->expires_at)->format('Y-m-d') : '' }}"
                    >

                </div>
                 <div class="mb-3">

    <label>
        Status
    </label>

    <select
        name="status"
        class="form-control"
    >

        <option
            value="1"
            {{ $coupon->status ? 'selected' : '' }}
        >
            Active
        </option>

        <option
            value="0"
            {{ !$coupon->status ? 'selected' : '' }}
        >
            Inactive
        </option>

    </select>

</div>
                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Update Coupon
                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>