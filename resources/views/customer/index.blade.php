<x-app-layout>

```
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Customers
    </h2>
</x-slot>

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-dark text-warning">

            <h4 class="mb-0">
                Customers List
            </h4>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($customers as $customer)

                        <tr>

                            <td>{{ $customer->id }}</td>

                            <td>{{ $customer->name }}</td>

                            <td>{{ $customer->phone }}</td>

                            <td>{{ $customer->email }}</td>

                            <td>{{ $customer->created_at }}</td>

                            <td>

                                <a
                                    href="{{ route('customers.cart', $customer->id) }}"
                                    class="btn btn-warning btn-sm"
                                >
                                    View Cart
                                </a>

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
