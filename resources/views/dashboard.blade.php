<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-gauge fa-lg me-2"></i>
            <span>Admin Dashboard</span>
        </div>
    </x-slot>

    <style>
        /* ===== DARK THEME ===== */
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e) !important;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1a1a2e; }
        ::-webkit-scrollbar-thumb { background: #ffc107; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #f59e0b; }

        /* ===== STATS CARDS ===== */
        .stats-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 25px 20px;
            text-align: center;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: default;
            position: relative;
            overflow: hidden;
        }
        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255,193,7,0.05), transparent);
            opacity: 0;
            transition: all 0.5s;
        }
        .stats-card:hover {
            transform: translateY(-10px) scale(1.02);
            border-color: rgba(255, 193, 7, 0.3);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        .stats-card:hover::before {
            opacity: 1;
        }

        .stats-card .stats-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
            display: block;
            opacity: 0.8;
        }

        .stats-card .stats-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #fff;
            display: block;
            text-shadow: 0 0 30px rgba(255,255,255,0.1);
        }

        .stats-card .stats-label {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ===== CARD ===== */
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6);
            overflow: hidden;
            margin-top: 30px;
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

        .glass-card .card-body {
            padding: 25px;
            color: #fff;
        }

        /* ===== BUTTONS ===== */
        .btn-glass {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #fff;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        .btn-glass:hover {
            background: rgba(255, 193, 7, 0.15);
            border-color: #ffc107;
            color: #ffc107;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255, 193, 7, 0.1);
        }
        .btn-glass i { margin-right: 8px; }

        .btn-glass-primary { border-color: rgba(59, 130, 246, 0.3); }
        .btn-glass-primary:hover { background: rgba(59, 130, 246, 0.15); border-color: #3b82f6; color: #60a5fa; }

        .btn-glass-success { border-color: rgba(34, 197, 94, 0.3); }
        .btn-glass-success:hover { background: rgba(34, 197, 94, 0.15); border-color: #22c55e; color: #22c55e; }

        .btn-glass-warning { border-color: rgba(255, 193, 7, 0.3); }
        .btn-glass-warning:hover { background: rgba(255, 193, 7, 0.15); border-color: #ffc107; color: #ffc107; }

        .btn-glass-danger { border-color: rgba(239, 68, 68, 0.3); }
        .btn-glass-danger:hover { background: rgba(239, 68, 68, 0.15); border-color: #ef4444; color: #ef4444; }

        .btn-glass-info { border-color: rgba(14, 165, 233, 0.3); }
        .btn-glass-info:hover { background: rgba(14, 165, 233, 0.15); border-color: #0ea5e9; color: #0ea5e9; }

        .btn-glass-dark { border-color: rgba(255, 255, 255, 0.1); }
        .btn-glass-dark:hover { background: rgba(255, 255, 255, 0.08); border-color: rgba(255,255,255,0.2); color: #fff; }

        /* ===== TABLE ===== */
        .table-glass {
            color: #e0e0e0;
            margin: 0;
        }

        .table-glass thead th {
            border-bottom: 2px solid #ffc107;
            color: #ffc107;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.8px;
            padding: 14px 12px;
            background: transparent;
        }

        .table-glass tbody td {
            vertical-align: middle;
            padding: 14px 12px;
            border-color: rgba(255, 255, 255, 0.05);
        }

        .table-glass tbody tr {
            transition: all 0.3s;
        }
        .table-glass tbody tr:hover {
            background: rgba(255, 193, 7, 0.04);
        }

        /* ===== BADGE ===== */
        .badge-status {
            padding: 5px 14px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .stats-card .stats-number { font-size: 1.8rem; }
            .stats-card .stats-icon { font-size: 2rem; }
            .glass-card .card-body { padding: 18px; }
        }

        @media (max-width: 576px) {
            .stats-card { padding: 18px 15px; }
            .stats-card .stats-number { font-size: 1.5rem; }
        }
    </style>

    <div class="container mt-5">

        <!-- ===== STATS ROW ===== -->
        <div class="row g-4">

            <!-- Categories -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-card">
                    <span class="stats-icon" style="color: #3b82f6;">
                        <i class="fa-solid fa-folder"></i>
                    </span>
                    <span class="stats-number">{{ $categoriesCount }}</span>
                    <span class="stats-label">Categories</span>
                </div>
            </div>

            <!-- Products -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-card">
                    <span class="stats-icon" style="color: #22c55e;">
                        <i class="fa-solid fa-box"></i>
                    </span>
                    <span class="stats-number">{{ $productsCount }}</span>
                    <span class="stats-label">Products</span>
                </div>
            </div>

            <!-- Colors -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-card">
                    <span class="stats-icon" style="color: #ffc107;">
                        <i class="fa-solid fa-palette"></i>
                    </span>
                    <span class="stats-number">{{ $colorsCount }}</span>
                    <span class="stats-label">Colors</span>
                </div>
            </div>

            <!-- Sizes -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-card">
                    <span class="stats-icon" style="color: #ef4444;">
                        <i class="fa-solid fa-ruler"></i>
                    </span>
                    <span class="stats-number">{{ $sizesCount }}</span>
                    <span class="stats-label">Sizes</span>
                </div>
            </div>

            <!-- Customers -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-card">
                    <span class="stats-icon" style="color: #0ea5e9;">
                        <i class="fa-solid fa-users"></i>
                    </span>
                    <span class="stats-number">{{ $customersCount }}</span>
                    <span class="stats-label">Customers</span>
                </div>
            </div>

            <!-- Orders -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-card">
                    <span class="stats-icon" style="color: #8b5cf6;">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </span>
                    <span class="stats-number">{{ $ordersCount }}</span>
                    <span class="stats-label">Orders</span>
                </div>
            </div>

            <!-- Coupons -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-card">
                    <span class="stats-icon" style="color: #ec4899;">
                        <i class="fa-solid fa-ticket"></i>
                    </span>
                    <span class="stats-number">{{ $couponsCount }}</span>
                    <span class="stats-label">Coupons</span>
                </div>
            </div>

            <!-- Revenue -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-card">
                    <span class="stats-icon" style="color: #14b8a6;">
                        <i class="fa-solid fa-money-bill"></i>
                    </span>
                    <span class="stats-number">{{ $revenue }} JD</span>
                    <span class="stats-label">Revenue</span>
                </div>
            </div>

        </div>

        <!-- ===== SYSTEM MANAGEMENT ===== -->
        <div class="glass-card card">
            <div class="card-header">
                <h4>
                    <i class="fa-solid fa-cogs"></i> System Management
                </h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="{{ route('categories.index') }}" class="btn-glass btn-glass-primary">
                            <i class="fa-solid fa-folder"></i> Categories
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="{{ route('products.index') }}" class="btn-glass btn-glass-success">
                            <i class="fa-solid fa-box"></i> Products
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="{{ route('colors.index') }}" class="btn-glass btn-glass-warning">
                            <i class="fa-solid fa-palette"></i> Colors
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="{{ route('sizes.index') }}" class="btn-glass btn-glass-danger">
                            <i class="fa-solid fa-ruler"></i> Sizes
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="{{ route('customers.index') }}" class="btn-glass btn-glass-info">
                            <i class="fa-solid fa-users"></i> Customers
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <a href="{{ route('coupons.index') }}" class="btn-glass btn-glass-dark">
                            <i class="fa-solid fa-ticket"></i> Coupons
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== LATEST ORDERS ===== -->
        <div class="glass-card card mt-4">
            <div class="card-header">
                <h4>
                    <i class="fa-solid fa-clock-rotate-left"></i> Latest Orders
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-glass">
                        <thead>
                            <tr>
                                <th><i class="fa-regular fa-hashtag me-1"></i> ID</th>
                                <th><i class="fa-regular fa-user me-1"></i> Customer</th>
                                <th><i class="fa-regular fa-money-bill-1 me-1"></i> Total</th>
                                <th><i class="fa-regular fa-circle-check me-1"></i> Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestOrders as $order)
                                <tr>
                                    <td><strong>#{{ $order->id }}</strong></td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td><span style="color: #ffc107;">{{ $order->total }} JD</span></td>
                                    <td>
                                        @php
                                            $statusColors = [
                                                'pending' => 'bg-warning text-dark',
                                                'processing' => 'bg-info text-dark',
                                                'completed' => 'bg-success',
                                                'cancelled' => 'bg-danger',
                                                'shipped' => 'bg-primary',
                                            ];
                                            $color = $statusColors[$order->status] ?? 'bg-secondary';
                                        @endphp
                                        <span class="badge-status {{ $color }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        <i class="fa-regular fa-inbox fa-2x d-block mb-2" style="opacity:0.3;"></i>
                                        No orders found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>