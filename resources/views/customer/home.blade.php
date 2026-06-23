@php use Illuminate\Support\Facades\Auth; @endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🏠 Customer Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-bottom: 50px;
        }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1a1a2e; }
        ::-webkit-scrollbar-thumb { background: #ffc107; border-radius: 10px; }

        .navbar {
            background: rgba(0, 0, 0, 0.88) !important;
            backdrop-filter: blur(15px);
            border-bottom: 2px solid #ffc107;
            padding: 14px 0;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        }
        .navbar-brand {
            font-size: 1.4rem;
            font-weight: 800;
            color: #ffc107 !important;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }
        .navbar-brand:hover {
            transform: scale(1.05);
            text-shadow: 0 0 30px rgba(255, 193, 7, 0.3);
        }
        .navbar-brand i { margin-right: 10px; }

        .nav-link-custom {
            color: rgba(255, 255, 255, 0.8) !important;
            transition: all 0.3s ease;
            padding: 8px 18px !important;
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.95rem;
        }
        .nav-link-custom:hover {
            color: #ffc107 !important;
            background: rgba(255, 193, 7, 0.1);
            transform: translateY(-2px);
        }
        .nav-link-custom.active {
            color: #1a1a2e !important;
            background: #ffc107;
            box-shadow: 0 0 25px rgba(255, 193, 7, 0.3);
        }
        .nav-link-custom i { margin-right: 8px; }

        .btn-logout {
            background: transparent !important;
            border: none !important;
            color: #ff6b6b !important;
            padding: 8px 18px !important;
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s;
        }
        .btn-logout:hover {
            background: rgba(255, 107, 107, 0.15) !important;
            transform: translateY(-2px);
        }
        .btn-logout i { margin-right: 8px; }

        .dashboard-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6);
            overflow: hidden;
            margin-top: 35px;
        }
        .dashboard-card .card-header {
            background: linear-gradient(135deg, #ffc107, #f59e0b) !important;
            padding: 22px 30px;
            border: none;
            border-radius: 24px 24px 0 0 !important;
        }
        .dashboard-card .card-header h4 {
            color: #1a1a2e;
            font-weight: 800;
            margin: 0;
            font-size: 1.4rem;
        }
        .dashboard-card .card-header h4 i { margin-right: 12px; }
        .dashboard-card .card-body { padding: 30px; color: #fff; }

        .welcome-text {
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #ffc107, #f59e0b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }
        .stat-item {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 193, 7, 0.1);
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s;
        }
        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(255, 193, 7, 0.1);
            border-color: rgba(255, 193, 7, 0.3);
        }
        .stat-item i {
            font-size: 2.5rem;
            color: #ffc107;
            margin-bottom: 10px;
            display: block;
        }
        .stat-item .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #fff;
            display: block;
        }
        .stat-item .stat-label {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        @media (max-width: 768px) {
            .navbar-brand { font-size: 1.1rem; }
            .nav-link-custom { padding: 6px 12px !important; font-size: 0.85rem; }
            .welcome-text { font-size: 1.5rem; }
            .dashboard-card .card-header h4 { font-size: 1.1rem; }
            .dashboard-card .card-body { padding: 20px; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .stat-item { padding: 15px; }
            .stat-item i { font-size: 2rem; }
            .stat-item .stat-number { font-size: 1.5rem; }
        }
        @media (max-width: 480px) { .stats-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('customer.home') }}"><i class="fas fa-user-circle"></i> Customer Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link nav-link-custom active" href="{{ route('customer.home') }}"><i class="fas fa-home"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link nav-link-custom" href="{{ route('customer.products') }}"><i class="fas fa-box"></i> Products</a></li>
                <li class="nav-item"><a class="nav-link nav-link-custom" href="{{ route('customer.cart') }}"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                <li class="nav-item"><a class="nav-link nav-link-custom" href="{{ route('customer.profile') }}"><i class="fas fa-user"></i> Profile</a></li>
                <li class="nav-item"><a class="nav-link nav-link-custom" href="{{ route('customer.addresses') }}"><i class="fas fa-map-marker-alt"></i> Addresses</a></li>
                <li class="nav-item">
                    <form action="{{ route('customer.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="dashboard-card card">
        <div class="card-header"><h4><i class="fas fa-chart-pie"></i> Dashboard</h4></div>
        <div class="card-body">
            <h2 class="welcome-text">Welcome, {{ Auth::guard('customer')->user()->name }}</h2>
            <p style="color: rgba(255,255,255,0.6); font-size: 1.1rem;">
                <i class="fas fa-check-circle" style="color: #22c55e;"></i> Customer dashboard works successfully.
            </p>
            <hr style="border-color: rgba(255,255,255,0.05);">
            <div class="stats-grid">
                <div class="stat-item"><i class="fas fa-shopping-bag"></i><span class="stat-number">{{ $productsCount ?? 0 }}</span><span class="stat-label">Products</span></div>
                <div class="stat-item"><i class="fas fa-shopping-cart"></i><span class="stat-number">{{ $cartCount ?? 0 }}</span><span class="stat-label">Cart Items</span></div>
                <div class="stat-item"><i class="fas fa-map-marker-alt"></i><span class="stat-number">{{ $addressesCount ?? 0 }}</span><span class="stat-label">Addresses</span></div>
                <div class="stat-item"><i class="fas fa-clock"></i><span class="stat-number">{{ $ordersCount ?? 0 }}</span><span class="stat-label">Orders</span></div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>