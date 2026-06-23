<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>➕ Add Address</title>
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

        /* ===== FORM CARD ===== */
        .form-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6);
            overflow: hidden;
            margin-top: 35px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-card .card-header {
            background: linear-gradient(135deg, #ffc107, #f59e0b) !important;
            padding: 22px 30px;
            border: none;
            border-radius: 24px 24px 0 0 !important;
        }
        .form-card .card-header h4 {
            color: #1a1a2e;
            font-weight: 800;
            margin: 0;
            font-size: 1.4rem;
        }
        .form-card .card-header h4 i { margin-right: 12px; }

        .form-card .card-body {
            padding: 30px;
        }

        /* ===== FORM ===== */
        .form-label-custom {
            color: #ffc107;
            font-weight: 600;
            margin-bottom: 8px;
        }
        .form-label-custom i { margin-right: 8px; }

        .form-control-custom {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 12px 16px;
            color: #fff;
            transition: all 0.3s;
        }
        .form-control-custom:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #ffc107;
            box-shadow: 0 0 30px rgba(255, 193, 7, 0.1);
            color: #fff;
            outline: none;
        }
        .form-control-custom::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        textarea.form-control-custom {
            resize: vertical;
            min-height: 100px;
        }

        .btn-save {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            border: none;
            padding: 14px 30px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.05rem;
            color: #fff;
            transition: all 0.3s;
            width: 100%;
        }
        .btn-save:hover {
            transform: scale(1.02);
            box-shadow: 0 0 40px rgba(34, 197, 94, 0.3);
            color: #fff;
        }
        .btn-save i { margin-right: 10px; }

        .btn-back {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 10px 20px;
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
        .btn-back i { margin-right: 8px; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .navbar-brand { font-size: 1.1rem; }
            .nav-link-custom { padding: 6px 12px !important; font-size: 0.85rem; }
            .form-card .card-header h4 { font-size: 1.1rem; }
            .form-card .card-body { padding: 20px; }
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
    <div class="form-card card">
        <div class="card-header">
            <h4>
                <i class="fas fa-plus-circle"></i> Add New Address
            </h4>
        </div>
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Error!</strong> Please fix the following:
                    <ul class="mb-0 mt-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('customer.addresses.store') }}" method="POST">
                @csrf

                <!-- Title -->
                <div class="mb-4">
                    <label class="form-label-custom">
                        <i class="fas fa-tag"></i> Title
                    </label>
                    <input type="text"
                           name="title"
                           class="form-control form-control-custom"
                           placeholder="e.g. Home, Work, Office"
                           value="{{ old('title') }}"
                           required>
                    <small class="text-muted" style="color: rgba(255,255,255,0.3) !important;">
                        Give your address a descriptive name
                    </small>
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label class="form-label-custom">
                        <i class="fas fa-map-pin"></i> Address
                    </label>
                    <textarea name="address"
                              class="form-control form-control-custom"
                              rows="4"
                              placeholder="Enter your full address here..."
                              required>{{ old('address') }}</textarea>
                    <small class="text-muted" style="color: rgba(255,255,255,0.3) !important;">
                        Include street, city, country, and any landmark
                    </small>
                </div>

                <!-- Buttons -->
                <div class="d-flex gap-2">
                    <a href="{{ route('customer.addresses') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                    <button type="submit" class="btn-save">
                        <i class="fas fa-save"></i> Save Address
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>