@php use Illuminate\Support\Facades\Auth; @endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>👤 My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ===== RESET & BODY ===== */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-bottom: 50px;
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1a1a2e; }
        ::-webkit-scrollbar-thumb { background: #ffc107; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #f59e0b; }

        /* ===== NAVBAR ===== */
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

        /* ===== PROFILE CARD ===== */
        .profile-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6);
            overflow: hidden;
            margin-top: 35px;
        }

        .profile-card .card-header {
            background: linear-gradient(135deg, #ffc107, #f59e0b) !important;
            padding: 22px 30px;
            border: none;
            border-radius: 24px 24px 0 0 !important;
        }
        .profile-card .card-header h4 {
            color: #1a1a2e;
            font-weight: 800;
            margin: 0;
            font-size: 1.4rem;
        }
        .profile-card .card-header h4 i { margin-right: 12px; }

        .profile-card .card-body {
            padding: 30px;
            color: #fff;
        }

        /* ===== PROFILE INFO ===== */
        .profile-info {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .info-row {
            display: flex;
            align-items: center;
            padding: 14px 20px;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s;
        }
        .info-row:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(255, 193, 7, 0.15);
        }

        .info-row .info-icon {
            width: 42px;
            height: 42px;
            background: rgba(255, 193, 7, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffc107;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .info-row .info-label {
            font-weight: 600;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            min-width: 80px;
        }

        .info-row .info-value {
            font-weight: 600;
            color: #fff;
            font-size: 1.05rem;
        }

        /* ===== ADDRESSES SECTION ===== */
        .address-section {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .address-section .section-title {
            color: #ffc107;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 15px;
        }
        .address-section .section-title i { margin-right: 10px; }

        .address-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .address-list li {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 14px 18px;
            margin-bottom: 10px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .address-list li:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(255, 193, 7, 0.15);
        }

        .address-list li .address-badge {
            background: rgba(255, 193, 7, 0.15);
            color: #ffc107;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        .address-list li .address-details {
            flex: 1;
        }
        .address-list li .address-details strong {
            color: #fff;
            display: block;
        }
        .address-list li .address-details span {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
        }

        .address-list li .address-icon {
            color: #ffc107;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        /* ===== BUTTONS ===== */
        .btn-manage-address {
            background: linear-gradient(135deg, #ffc107, #f59e0b);
            border: none;
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 700;
            color: #1a1a2e;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }
        .btn-manage-address:hover {
            transform: scale(1.03);
            box-shadow: 0 0 30px rgba(255, 193, 7, 0.3);
            color: #1a1a2e;
        }
        .btn-manage-address i { margin-right: 8px; }

        /* ===== ALERT ===== */
        .alert-glass {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            color: #fff;
        }
        .alert-glass.alert-success {
            border-color: rgba(34, 197, 94, 0.3);
            color: #22c55e;
        }
        .alert-glass.alert-warning {
            border-color: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .navbar-brand { font-size: 1.1rem; }
            .nav-link-custom { padding: 6px 12px !important; font-size: 0.85rem; }
            .profile-card .card-header h4 { font-size: 1.1rem; }
            .profile-card .card-body { padding: 20px; }
            .info-row { flex-wrap: wrap; gap: 5px; }
            .info-row .info-label { min-width: 60px; font-size: 0.75rem; }
            .info-row .info-value { font-size: 0.95rem; }
            .address-list li { flex-wrap: wrap; }
        }

        @media (max-width: 480px) {
            .info-row { padding: 12px 14px; }
            .info-row .info-icon { width: 34px; height: 34px; font-size: 0.8rem; margin-right: 10px; }
        }
    </style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('customer.home') }}">
            <i class="fas fa-user-circle"></i> Customer Panel
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('customer.home') }}">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('customer.products') }}">
                        <i class="fas fa-box"></i> Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('customer.cart') }}">
                        <i class="fas fa-shopping-cart"></i> Cart
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom active" href="{{ route('customer.profile') }}">
                        <i class="fas fa-user"></i> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('customer.addresses') }}">
                        <i class="fas fa-map-marker-alt"></i> Addresses
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('customer.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn-logout">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ===== MAIN CONTENT ===== -->
<div class="container">
    <div class="profile-card card">
        <div class="card-header">
            <h4>
                <i class="fas fa-user-circle"></i> My Profile
            </h4>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-glass alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @php
                $user = Auth::guard('customer')->user();
                $addresses = $user->addresses ?? collect();
            @endphp

            <!-- ===== PROFILE INFO ===== -->
            <div class="profile-info">
                <!-- Name -->
                <div class="info-row">
                    <div class="info-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="info-label">Name</span>
                    <span class="info-value">{{ $user->name }}</span>
                </div>

                <!-- Phone -->
                <div class="info-row">
                    <div class="info-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <span class="info-label">Phone</span>
                    <span class="info-value">{{ $user->phone ?? 'Not provided' }}</span>
                </div>

                <!-- Email -->
                <div class="info-row">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <span class="info-label">Email</span>
                    <span class="info-value">{{ $user->email }}</span>
                </div>

                <!-- Created At -->
                <div class="info-row">
                    <div class="info-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <span class="info-label">Joined</span>
                    <span class="info-value">{{ $user->created_at->format('d M Y') }}</span>
                </div>
            </div>

            <!-- ===== ADDRESSES SECTION ===== -->
            <div class="address-section">
                <div class="section-title">
                    <i class="fas fa-map-marker-alt"></i> My Addresses
                </div>

                @if($addresses->count())
                    <ul class="address-list">
                        @foreach($addresses as $address)
                            <li>
                                <span class="address-icon">
                                    <i class="fas fa-home"></i>
                                </span>
                                <div class="address-details">
                                    <strong>{{ $address->title }}</strong>
                                    <span>{{ $address->address }}</span>
                                </div>
                                <span class="address-badge">
                                    <i class="fas fa-check-circle"></i> Saved
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="alert alert-glass alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        No addresses found. Please add an address.
                    </div>
                @endif

                <a href="{{ route('customer.addresses') }}" class="btn-manage-address">
                    <i class="fas fa-edit"></i> Manage Addresses
                </a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>