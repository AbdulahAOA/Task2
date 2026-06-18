<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Customer Cart
    </h2>
</x-slot>

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-dark text-warning">

            <h4 class="mb-0">

                {{ $customer->name }} Cart

            </h4>

        </div>
        

        <div class="card-body">

            @if($cart && $cart->items->count())

                <table class="table table-bordered">

                    <thead>

                        <tr>

                            <th>Product</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Quantity</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($cart->items as $item)

                            <tr>

                                <td>
                                    {{ $item->product->name_en }}
                                </td>

                                <td>
                                    {{ $item->color?->name_en ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->size?->name_en ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->price }} JD
                                </td>

                                <td>
                                    {{ $item->quantity }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="alert alert-warning">

                    Customer cart is empty

                </div>

            @endif

        </div>

    </div>

</div>

</x-app-layout>