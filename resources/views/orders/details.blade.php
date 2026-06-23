<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <span style="font-size: 1.2rem; margin-right: 8px;">🧾</span>
            <span>Order Details</span>
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
            margin-bottom: 25px;
        }
        .glass-card .card-header {
            background: linear-gradient(135deg, #ffc107, #f59e0b) !important;
            padding: 18px 25px;
            border: none;
            border-radius: 24px 24px 0 0 !important;
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
        }
        .table-glass thead th {
            border-bottom: 2px solid #ffc107;
            color: #ffc107;
            font-weight: 700;
            font-size: 0.75rem;
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

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
        .info-item {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 14px 18px;
            transition: all 0.3s;
        }
        .info-item:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(255, 193, 7, 0.15);
        }
        .info-item .info-label {
            font-weight: 600;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: block;
        }
        .info-item .info-value {
            font-weight: 700;
            color: #fff;
            font-size: 1.05rem;
            margin-top: 4px;
            display: block;
        }
        .info-item .info-value.text-warning { color: #ffc107; }
        .info-item .info-value.text-success { color: #22c55e; }
        .info-item .info-value.text-danger { color: #ef4444; }

        .badge-status {
            padding: 5px 14px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.75rem;
        }
        .badge-status.bg-success { background: rgba(34, 197, 94, 0.2) !important; color: #22c55e; }
        .badge-status.bg-danger { background: rgba(239, 68, 68, 0.2) !important; color: #ef4444; }
        .badge-status.bg-warning { background: rgba(255, 193, 7, 0.2) !important; color: #ffc107; }
        .badge-status.bg-info { background: rgba(14, 165, 233, 0.2) !important; color: #0ea5e9; }

        .order-title {
            color: #ffc107;
            font-weight: 800;
            margin-bottom: 20px;
        }
        .order-title span { margin-right: 12px; }

        .header-icon { font-size: 1rem; margin-right: 6px; }

        @media (max-width: 768px) {
            .glass-card .card-body { padding: 18px; }
            .info-grid { grid-template-columns: 1fr 1fr; }
            .table-glass thead th { font-size: 0.6rem; padding: 10px 6px; }
            .table-glass tbody td { padding: 10px 6px; font-size: 0.85rem; }
        }
        @media (max-width: 480px) {
            .info-grid { grid-template-columns: 1fr; }
        }
    </style>

    <div class="container mt-4">

        <div class="mb-3">
            <a href="{{ route('orders.index') }}" class="btn-back">
                <span>⬅️</span> Back To Orders
            </a>
        </div>

        <h2 class="order-title">
            <span>🧾</span> Order #{{ $order->id }}
        </h2>

        {{-- ===== Order Information ===== --}}
        <div class="glass-card card">
            <div class="card-header">
                <h4><span style="margin-right: 8px;">📋</span> Order Information</h4>
            </div>
            <div class="card-body">
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">👤 Customer</span>
                        <span class="info-value">{{ $order->customer->name }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">📍 Address</span>
                        <span class="info-value">{{ $order->address }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">✅ Status</span>
                        <span class="info-value">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-warning',
                                    'processing' => 'bg-info',
                                    'completed' => 'bg-success',
                                    'cancelled' => 'bg-danger',
                                    'shipped' => 'bg-info'
                                ];
                                $color = $statusColors[$order->status] ?? 'bg-secondary';
                            @endphp
                            <span class="badge-status {{ $color }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">🎫 Coupon</span>
                        <span class="info-value">{{ $order->coupon?->code ?? 'No Coupon' }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">💰 Original Total</span>
                        <span class="info-value text-warning">{{ $order->original_total ?? $order->total }} JD</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">🔢 Discount</span>
                        <span class="info-value text-danger">{{ $order->discount_amount ?? 0 }} JD</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">📊 Discount %</span>
                        <span class="info-value">{{ $order->discount_percent ?? 0 }}%</span>
                    </div>
                    <div class="info-item" style="border-color: rgba(255, 193, 7, 0.3);">
                        <span class="info-label">💳 Final Total</span>
                        <span class="info-value text-success" style="font-size: 1.3rem;">{{ $order->total }} JD</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== Order Items ===== --}}
        <div class="glass-card card">
            <div class="card-header">
                <h4><span style="margin-right: 8px;">📦</span> Order Items</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-glass">
                        <thead>
                            <tr>
                                <th><span class="header-icon">📦</span> Product</th>
                                <th><span class="header-icon">🎨</span> Color</th>
                                <th><span class="header-icon">📏</span> Size</th>
                                <th><span class="header-icon">💰</span> Price</th>
                                <th><span class="header-icon">🔢</span> Quantity</th>
                                <th><span class="header-icon">🧮</span> Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $orderTotal = 0; @endphp
                            @foreach($order->items as $item)
                                @php
                                    $subtotal = $item->price * $item->quantity;
                                    $orderTotal += $subtotal;
                                @endphp
                                <tr>
                                    <td>
                                        <a href="{{ route('store.product', $item->product->id) }}"
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
                                    <span style="font-size: 1.2rem; margin-right: 8px;">💰</span> Total:
                                </td>
                                <td style="font-weight: 800; font-size: 1.3rem; color: #ffc107; padding: 16px 12px; border-top: 2px solid #ffc107;">
                                    {{ $orderTotal }} JD
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>