<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📍 My Addresses</title>
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

        /* ===== PAGE HEADER ===== */
        .page-header {
            margin-top: 35px;
            margin-bottom: 30px;
        }
        .page-header h2 {
            color: #ffc107;
            font-weight: 800;
            text-shadow: 0 0 30px rgba(255, 193, 7, 0.15);
        }
        .page-header h2 i { margin-right: 12px; }

        /* ===== ADDRESS CARD ===== */
        .address-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6);
            overflow: hidden;
        }

        .address-card .card-header {
            background: linear-gradient(135deg, #ffc107, #f59e0b) !important;
            padding: 18px 25px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }
        .address-card .card-header h4 {
            color: #1a1a2e;
            font-weight: 800;
            margin: 0;
            font-size: 1.2rem;
        }
        .address-card .card-header h4 i { margin-right: 10px; }

        .btn-add-address {
            background: rgba(26, 26, 46, 0.2);
            border: none;
            padding: 8px 20px;
            border-radius: 50px;
            color: #1a1a2e;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
        .btn-add-address:hover {
            background: rgba(26, 26, 46, 0.4);
            color: #1a1a2e;
            transform: scale(1.05);
        }
        .btn-add-address i { margin-right: 6px; }

        .address-card .card-body {
            padding: 25px;
        }

        /* ===== TABLE ===== */
        .table-address {
            color: #e0e0e0;
            margin: 0;
        }

        .table-address thead th {
            border-bottom: 2px solid #ffc107;
            color: #ffc107;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.8px;
            padding: 14px 12px;
            background: transparent;
        }

        .table-address tbody td {
            vertical-align: middle;
            padding: 14px 12px;
            border-color: rgba(255, 255, 255, 0.05);
        }

        .table-address tbody tr {
            transition: all 0.3s;
        }
        .table-address tbody tr:hover {
            background: rgba(255, 193, 7, 0.04);
        }

        /* ===== BADGE ===== */
        .badge-address {
            background: rgba(255, 193, 7, 0.15);
            color: #ffc107;
            padding: 4px 14px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        /* ===== DELETE BUTTON ===== */
        .btn-delete-address {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        .btn-delete-address:hover {
            background: #ef4444;
            color: #fff;
            transform: scale(1.1);
            box-shadow: 0 0 30px rgba(239, 68, 68, 0.3);
        }

        /* ===== EMPTY STATE ===== */
        .empty-address {
            text-align: center;
            padding: 50px 20px;
        }
        .empty-address i {
            font-size: 4rem;
            color: #ffc107;
            opacity: 0.4;
            margin-bottom: 20px;
            display: block;
        }
        .empty-address h4 {
            color: #fff;
            font-weight: 700;
        }
        .empty-address p {
            color: rgba(255, 255, 255, 0.5);
        }

        .btn-add-first {
            background: linear-gradient(135deg, #ffc107, #f59e0b);
            border: none;
            padding: 12px 35px;
            border-radius: 50px;
            font-weight: 700;
            color: #1a1a2e;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }
        .btn-add-first:hover {
            transform: scale(1.05);
            box-shadow: 0 0 40px rgba(255, 193, 7, 0.3);
            color: #1a1a2e;
        }
        .btn-add-first i { margin-right: 8px; }

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

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .navbar-brand { font-size: 1.1rem; }
            .nav-link-custom { padding: 6px 12px !important; font-size: 0.85rem; }
            .page-header h2 { font-size: 1.5rem; }
            .address-card .card-header { padding: 15px 18px; }
            .address-card .card-header h4 { font-size: 1rem; }
            .address-card .card-body { padding: 18px; }
            .table-address thead th { font-size: 0.6rem; padding: 10px 6px; }
            .table-address tbody td { padding: 10px 6px; font-size: 0.85rem; }
            .btn-add-address { font-size: 0.8rem; padding: 6px 14px; }
        }

        @media (max-width: 576px) {
            .table-address { font-size: 0.75rem; }
            .table-address thead th { font-size: 0.5rem; padding: 8px 4px; }
            .table-address tbody td { padding: 8px 4px; }
            .btn-delete-address { width: 30px; height: 30px; font-size: 0.8rem; }
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
                    <a class="nav-link nav-link-custom" href="{{ route('customer.profile') }}">
                        <i class="fas fa-user"></i> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom active" href="{{ route('customer.addresses') }}">
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
    <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h2>
            <i class="fas fa-map-marker-alt"></i> My Addresses
        </h2>
        <a href="{{ route('customer.addresses.create') }}" class="btn-add-first">
            <i class="fas fa-plus-circle"></i> Add Address
        </a>
    </div>

    <div class="address-card card">
        <div class="card-header">
            <h4>
                <i class="fas fa-list"></i> Saved Addresses
            </h4>
            <span style="color: #1a1a2e; font-weight: 600; font-size: 0.9rem;">
                <i class="fas fa-boxes me-1"></i> {{ $addresses->count() }} address(es)
            </span>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-glass alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($addresses->count())
                <div class="table-responsive">
                    <table class="table table-address">
                        <thead>
                            <tr>
                                <th><i class="fas fa-tag me-1"></i> Title</th>
                                <th><i class="fas fa-map-pin me-1"></i> Address</th>
                                <th><i class="fas fa-trash me-1"></i> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($addresses as $address)
                                <tr>
                                    <td>
                                        <span class="badge-address">
                                            <i class="fas fa-home me-1"></i>
                                            {{ $address->title }}
                                        </span>
                                    </td>
                                    <td>{{ $address->address }}</td>
                                    <td>
                                        <form action="{{ route('customer.addresses.delete', $address->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this address?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete-address">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-address">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>No Addresses Saved</h4>
                    <p>Add your first address to start shopping!</p>
                    <a href="{{ route('customer.addresses.create') }}" class="btn-add-first">
                        <i class="fas fa-plus-circle"></i> Add Your First Address
                    </a>
                </div>
            @endif

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>