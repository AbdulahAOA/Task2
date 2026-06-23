<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📦 Products</title>
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

        /* ===== PRODUCT CARDS ===== */
        .product-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
        }
        .product-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 30px 60px rgba(255, 193, 7, 0.2);
            border-color: #ffc107;
        }

        .product-card .card-img-top {
            height: 250px;
            object-fit: cover;
            border-bottom: 2px solid rgba(255, 193, 7, 0.1);
        }

        .product-card .card-body {
            padding: 20px;
            color: #fff;
        }

        .product-card .card-title {
            color: #ffc107;
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .product-card .card-text {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.95rem;
            margin-bottom: 15px;
            min-height: 50px;
        }

        .btn-view-product {
            background: linear-gradient(135deg, #ffc107, #f59e0b);
            border: none;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 700;
            color: #1a1a2e;
            transition: all 0.3s;
            width: 100%;
        }
        .btn-view-product:hover {
            transform: scale(1.03);
            box-shadow: 0 0 30px rgba(255, 193, 7, 0.3);
            color: #1a1a2e;
        }
        .btn-view-product i { margin-right: 8px; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .navbar-brand { font-size: 1.1rem; }
            .nav-link-custom { padding: 6px 12px !important; font-size: 0.85rem; }
            .page-header h2 { font-size: 1.5rem; }
            .product-card .card-img-top { height: 180px; }
            .product-card .card-title { font-size: 1rem; }
        }

        @media (max-width: 576px) {
            .product-card .card-img-top { height: 150px; }
            .product-card .card-body { padding: 15px; }
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
                    <a class="nav-link nav-link-custom active" href="{{ route('customer.products') }}">
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
    <div class="page-header">
        <h2>
            <i class="fas fa-boxes"></i> Our Products
        </h2>
    </div>

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="product-card card">
                    @if($product->images->count())
                        <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                             class="card-img-top"
                             alt="{{ $product->name_en }}">
                    @else
                        <img src="https://via.placeholder.com/400x250?text=No+Image"
                             class="card-img-top"
                             alt="No Image">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name_en }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($product->description_en, 80) }}</p>
                        <a href="{{ route('customer.product', $product->id) }}" class="btn-view-product">
                            <i class="fas fa-eye"></i> View Product
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>