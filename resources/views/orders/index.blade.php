<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-truck fa-lg me-2"></i>
            <span>Orders Management</span>
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
        }
        .glass-card .card-header h4 {
            color: #1a1a2e;
            font-weight: 800;
            margin: 0;
            font-size: 1.2rem;
        }
        .glass-card .card-header h4 i { margin-right: 10px; }
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

        .btn-details {
            background: rgba(59, 130, 246, 0.15);
            border: 1px solid rgba(59, 130, 246, 0.3);
            color: #60a5fa;
            padding: 6px 16px;
            border-radius: 8px;
            font-size: 0.8rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-details:hover {
            background: rgba(59, 130, 246, 0.25);
            border-color: #3b82f6;
            color: #60a5fa;
            transform: scale(1.05);
        }
        .btn-details i { margin-right: 4px; }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
        }
        .empty-state i {
            font-size: 4rem;
            color: rgba(255, 193, 7, 0.2);
            display: block;
            margin-bottom: 15px;
        }
        .empty-state h5 { color: #fff; font-weight: 700; }
        .empty-state p { color: rgba(255, 255, 255, 0.4); }

        @media (max-width: 768px) {
            .glass-card .card-body { padding: 18px; }
            .table-glass thead th { font-size: 0.6rem; padding: 10px 6px; }
            .table-glass tbody td { padding: 10px 6px; font-size: 0.85rem; }
        }
    </style>

    <div class="container mt-4">
        <div class="glass-card card">
            <div class="card-header">
                <h4><i class="fa-regular fa-list"></i> Orders List</h4>
            </div>
            <div class="card-body">

                @if($orders->count())
                    <div class="table-responsive">
                        <table class="table table-glass">
                            <thead>
                                <tr>
                                    <th><i class="fa-regular fa-hashtag me-1"></i> ID</th>
                                    <th><i class="fa-regular fa-user me-1"></i> Customer</th>
                                    <th><i class="fa-regular fa-money-bill-1 me-1"></i> Total</th>
                                    <th><i class="fa-regular fa-circle-check me-1"></i> Status</th>
                                    <th><i class="fa-regular fa-ticket me-1"></i> Coupon</th>
                                    <th><i class="fa-regular fa-code me-1"></i> Code</th>
                                    <th><i class="fa-regular fa-calendar me-1"></i> Date</th>
                                    <th><i class="fa-regular fa-eye me-1"></i> Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td><span style="color: #ffc107; font-weight: 700;">#{{ $order->id }}</span></td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td><span style="color: #ffc107; font-weight: 600;">{{ $order->total }}</span> JD</td>
                                        <td>
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
                                        </td>
                                        <td>{{ $order->coupon ? '✅ Yes' : '❌ No' }}</td>
                                        <td>{{ $order->coupon?->code ?? '-' }}</td>
                                        <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                                        <td>
                                            <a href="{{ route('orders.details', $order->id) }}" class="btn-details">
                                                <i class="fa-regular fa-eye"></i> Details
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fa-regular fa-truck"></i>
                        <h5>No Orders Found</h5>
                        <p>There are no orders yet.</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>