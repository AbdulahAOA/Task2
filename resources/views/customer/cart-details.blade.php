<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <span style="font-size: 1.2rem; margin-right: 8px;">🛒</span>
            <span>Customer Cart</span>
        </div>
    </x-slot>

    <style>
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e) !important;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1a1a2e; }
        ::-webkit-scrollbar-thumb { background: #ffc107; border-radius: 10px; }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6);
            overflow: hidden;
        }
        .glass-card .card-header {
            background: linear-gradient(135deg, #ffc107, #f59e0b) !important;
            padding: 18px 25px;
            border: none;
            border-radius: 24px 24px 0 0 !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }
        .glass-card .card-header h4 {
            color: #1a1a2e;
            font-weight: 800;
            margin: 0;
            font-size: 1.2rem;
        }
        .glass-card .card-body { padding: 25px; color: #fff; }

        .table-glass {
            color: #e0e0e0;
            margin: 0;
            width: 100%;
        }
        .table-glass thead th {
            border-bottom: 2px solid #ffc107;
            color: #ffc107;
            font-weight: 700;
            font-size: 0.8rem;
            padding: 14px 12px;
            background: transparent;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .table-glass tbody td {
            padding: 14px 12px;
            border-color: rgba(255, 255, 255, 0.05);
            vertical-align: middle;
        }
        .table-glass tbody tr { transition: all 0.3s; }
        .table-glass tbody tr:hover { background: rgba(255, 193, 7, 0.04); }

        .btn-back {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 10px 24px;
            border-radius: 12px;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-block;
        }
        .btn-back:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #ffc107;
        }
        .btn-back span { margin-right: 8px; }

        .alert-glass-warning {
            background: rgba(255, 193, 7, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 193, 7, 0.2);
            border-radius: 12px;
            color: #ffc107;
            padding: 16px 20px;
            text-align: center;
        }
        .alert-glass-warning .big-icon { font-size: 3rem; display: block; margin-bottom: 10px; }

        .customer-badge {
            display: inline-block;
            padding: 4px 16px;
            background: rgba(255, 193, 7, 0.15);
            border: 1px solid rgba(255, 193, 7, 0.2);
            border-radius: 50px;
            color: #ffc107;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .badge-item-count {
            background: rgba(26, 26, 46, 0.2);
            color: #1a1a2e;
            padding: 4px 14px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.8rem;
        }

        .header-icon { font-size: 1rem; margin-right: 6px; }

        @media (max-width: 768px) {
            .glass-card .card-body { padding: 18px; }
            .table-glass thead th { font-size: 0.6rem; padding: 10px 6px; }
            .table-glass tbody td { padding: 10px 6px; font-size: 0.85rem; }
            .glass-card .card-header { flex-direction: column; align-items: flex-start; }
        }
    </style>

    <div class="container mt-4">
        <div class="glass-card card">
            <div class="card-header">
                <h4>
                    <span style="margin-right: 8px;">👤</span>
                    {{ $customer->name }}'s Cart
                    <span class="customer-badge ms-2">
                        <span style="margin-right: 4px;">📧</span> {{ $customer->email }}
                    </span>
                </h4>
                @if($cart && $cart->items->count())
                    <span class="badge-item-count">
                        <span style="margin-right: 4px;">📦</span> {{ $cart->items->count() }} item(s)
                    </span>
                @endif
            </div>
            <div class="card-body">

                @if($cart && $cart->items->count())
                    <div class="table-responsive">
                        <table class="table table-glass">
                            <thead>
                                <tr>
                                    <th><span class="header-icon">📦</span> Product</th>
                                    <th><span class="header-icon">🎨</span> Color</th>
                                    <th><span class="header-icon">📏</span> Size</th>
                                    <th><span class="header-icon">💰</span> Price</th>
                                    <th><span class="header-icon">🔢</span> Qty</th>
                                    <th><span class="header-icon">🧮</span> Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach($cart->items as $item)
                                    @php $subtotal = $item->price * $item->quantity; $total += $subtotal; @endphp
                                    <tr>
                                        <td>
                                            <a href="{{ route('customer.product', $item->product->id) }}"
                                               style="color: #ffc107; text-decoration: none; font-weight: 600;">
                                                {{ $item->product->name_en }}
                                            </a>
                                        </td>
                                        <td>{{ $item->color?->name_en ?? '-' }}</td>
                                        <td>{{ $item->size?->name_en ?? '-' }}</td>
                                        <td><span style="color: #ffc107; font-weight: 600;">{{ $item->price }}</span> JD</td>
                                        <td><span style="font-weight: 700;">{{ $item->quantity }}</span></td>
                                        <td><span style="color: #22c55e; font-weight: 700;">{{ $subtotal }}</span> JD</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" style="text-align: right; font-weight: 700; color: #ffc107; font-size: 1.1rem; padding: 16px 12px; border-top: 2px solid #ffc107;">
                                        <span style="font-size: 1.2rem; margin-right: 6px;">💰</span> Total:
                                    </td>
                                    <td style="font-weight: 800; font-size: 1.3rem; color: #ffc107; padding: 16px 12px; border-top: 2px solid #ffc107;">
                                        {{ $total }} JD
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <a href="{{ route('customers.index') }}" class="btn-back">
                            <span>⬅️</span> Back to Customers
                        </a>
                        <span style="color: rgba(255,255,255,0.3); font-size: 0.85rem;">
                            <span style="margin-right: 4px;">🕐</span>
                            Cart contains {{ $cart->items->count() }} item(s)
                        </span>
                    </div>

                @else
                    <div class="alert-glass-warning">
                        <span class="big-icon">🛒</span>
                        <h5 style="color: #fff; font-weight: 700;">Cart is Empty</h5>
                        <p style="color: rgba(255,255,255,0.5); margin: 0;">
                            {{ $customer->name }} hasn't added any items to their cart yet.
                        </p>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('customers.index') }}" class="btn-back">
                            <span>⬅️</span> Back to Customers
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>