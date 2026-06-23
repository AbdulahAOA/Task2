<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name_en }}</title>
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

        /* ===== PRODUCT CARD ===== */
        .product-detail-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6);
            overflow: hidden;
            margin-top: 35px;
            transition: all 0.5s ease;
        }
        .product-detail-card:hover {
            border-color: rgba(255, 193, 7, 0.2);
        }

        .product-detail-card .card-body {
            padding: 30px;
        }

        /* ===== PRODUCT TITLE ===== */
        .product-title {
            color: #ffc107;
            font-weight: 800;
            font-size: 2.2rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .product-title .badge-status {
            font-size: 0.8rem;
            padding: 4px 16px;
            border-radius: 50px;
            font-weight: 600;
        }
        .product-title .badge-status.in-stock {
            background: rgba(34, 197, 94, 0.15);
            color: #22c55e;
        }
        .product-title .badge-status.out-of-stock {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
        }

        .product-description {
            color: rgba(255, 255, 255, 0.6);
            font-size: 1.05rem;
            line-height: 1.8;
        }

        /* ===== IMAGE GALLERY ===== */
        .main-image-container {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            background: rgba(0,0,0,0.3);
        }

        #mainImage {
            width: 100%;
            height: 450px;
            object-fit: cover;
            transition: all 0.5s ease;
        }
        #mainImage:hover {
            transform: scale(1.02);
        }

        .thumbnail-container {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .thumbnail:hover {
            border-color: #ffc107;
            transform: scale(1.08) translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 193, 7, 0.2);
        }
        .thumbnail.active {
            border-color: #ffc107;
            box-shadow: 0 0 30px rgba(255, 193, 7, 0.3);
            transform: scale(1.05);
        }

        /* ===== INFO CARDS ===== */
        .info-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            padding: 20px;
            height: 100%;
            transition: all 0.4s ease;
        }
        .info-card:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(255, 193, 7, 0.15);
            transform: translateY(-3px);
        }

        .info-card .card-header-custom {
            font-weight: 700;
            font-size: 1rem;
            padding: 0 0 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            margin-bottom: 12px;
        }

        .info-card .card-header-custom i { margin-right: 8px; }

        .info-card .badge-item {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            margin: 4px;
            transition: all 0.3s;
        }
        .info-card .badge-item:hover {
            transform: scale(1.05);
        }

        .badge-color {
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .badge-size {
            background: rgba(34, 197, 94, 0.15);
            color: #22c55e;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .badge-price {
            background: rgba(255, 193, 7, 0.15);
            color: #ffc107;
            border: 1px solid rgba(255, 193, 7, 0.2);
        }

        .badge-stock {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        /* ===== PRICE DISPLAY ===== */
        .price-display {
            display: flex;
            align-items: baseline;
            gap: 10px;
            margin: 15px 0;
        }
        .price-display .current-price {
            font-size: 2.5rem;
            font-weight: 800;
            color: #ffc107;
        }
        .price-display .current-price small {
            font-size: 1rem;
            font-weight: 400;
            color: rgba(255,255,255,0.3);
        }

        /* ===== ADD TO CART FORM ===== */
        .cart-form-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            padding: 25px;
            margin-top: 20px;
            transition: all 0.4s ease;
        }
        .cart-form-card:hover {
            border-color: rgba(255, 193, 7, 0.15);
        }

        .cart-form-card .form-label {
            color: #ffc107;
            font-weight: 600;
        }
        .cart-form-card .form-label i { margin-right: 6px; }

        .form-control-custom {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 10px 14px;
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
        .form-control-custom option {
            background: #1a1a2e;
            color: #fff;
        }

        .btn-add-to-cart {
            background: linear-gradient(135deg, #ffc107, #f59e0b);
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.05rem;
            color: #1a1a2e;
            transition: all 0.4s ease;
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        .btn-add-to-cart::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            transition: all 0.5s;
            transform: translate(-50%, -50%);
        }
        .btn-add-to-cart:hover {
            transform: scale(1.02);
            box-shadow: 0 0 40px rgba(255, 193, 7, 0.3);
            color: #1a1a2e;
        }
        .btn-add-to-cart:hover::after {
            width: 300px;
            height: 300px;
        }
        .btn-add-to-cart i { margin-right: 10px; }

        .btn-back-products {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 10px 24px;
            border-radius: 12px;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-block;
            margin-top: 15px;
        }
        .btn-back-products:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #ffc107;
            transform: translateX(-5px);
        }
        .btn-back-products i { margin-right: 8px; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            #mainImage { height: 300px; }
            .product-title { font-size: 1.8rem; }
            .price-display .current-price { font-size: 2rem; }
        }

        @media (max-width: 768px) {
            .navbar-brand { font-size: 1.1rem; }
            .nav-link-custom { padding: 6px 12px !important; font-size: 0.85rem; }
            .product-detail-card .card-body { padding: 20px; }
            .product-title { font-size: 1.4rem; flex-wrap: wrap; }
            #mainImage { height: 220px; }
            .thumbnail { width: 60px; height: 60px; }
            .info-card { margin-bottom: 15px; }
            .price-display .current-price { font-size: 1.8rem; }
        }

        @media (max-width: 480px) {
            #mainImage { height: 180px; }
            .thumbnail { width: 50px; height: 50px; }
            .product-title { font-size: 1.2rem; }
            .product-description { font-size: 0.9rem; }
            .price-display .current-price { font-size: 1.5rem; }
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
    <div class="product-detail-card card">
        <div class="card-body">

            <!-- ===== PRODUCT TITLE ===== -->
            <div class="product-title">
                <span>📦</span>
                {{ $product->name_en }}
                @php
                    $totalQty = $product->variationQuantities->sum('quantity');
                @endphp
                <span class="badge-status {{ $totalQty > 0 ? 'in-stock' : 'out-of-stock' }}">
                    {{ $totalQty > 0 ? '✅ In Stock' : '❌ Out of Stock' }}
                </span>
            </div>

            <!-- ===== PRICE ===== -->
            <div class="price-display">
                <span class="current-price">
                    {{ $product->prices->min('price') ?? 0 }}
                    <small>JD</small>
                </span>
                @if($product->prices->count() > 1)
                    <span style="color: rgba(255,255,255,0.2);">—</span>
                    <span style="color: rgba(255,255,255,0.3); font-size: 0.9rem;">
                        <i class="fas fa-arrow-up"></i>
                        {{ $product->prices->max('price') }} JD
                    </span>
                @endif
            </div>

            <!-- ===== DESCRIPTION ===== -->
            <p class="product-description">
                {{ $product->description_en }}
            </p>

            <!-- ===== IMAGE GALLERY ===== -->
            @if($product->images->count())
                <div class="main-image-container mb-3">
                    <img id="mainImage"
                         src="{{ asset('storage/' . $product->images->first()->image) }}"
                         class="img-fluid"
                         alt="{{ $product->name_en }}">
                </div>
                <div class="thumbnail-container">
                    @foreach($product->images as $image)
                        <img src="{{ asset('storage/' . $image->image) }}"
                             class="thumbnail @if($loop->first) active @endif"
                             onclick="changeMainImage(this.src, this)"
                             alt="{{ $product->name_en }} - image {{ $loop->iteration }}">
                    @endforeach
                </div>
            @else
                <div class="main-image-container mb-3">
                    <img id="mainImage"
                         src="https://via.placeholder.com/800x450?text=No+Image"
                         class="img-fluid"
                         alt="No Image">
                </div>
            @endif

            <!-- ===== INFO CARDS ===== -->
            <div class="row mt-4">
                <!-- Colors -->
                <div class="col-md-4 mb-3">
                    <div class="info-card">
                        <div class="card-header-custom" style="color: #60a5fa;">
                            <i class="fas fa-palette"></i> Available Colors
                        </div>
                        @foreach($product->colors as $color)
                            <span class="badge-item badge-color">
                                <i class="fas fa-circle" style="color: {{ $color->color_code ?? '#888' }}; font-size: 0.7rem;"></i>
                                {{ $color->name_en }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <!-- Sizes & Prices -->
                <div class="col-md-4 mb-3">
                    <div class="info-card">
                        <div class="card-header-custom" style="color: #22c55e;">
                            <i class="fas fa-ruler"></i> Sizes & Prices
                        </div>
                        @foreach($product->prices as $price)
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span style="color: rgba(255,255,255,0.6);">
                                    {{ $price->size->name_en }}
                                </span>
                                <span class="badge-item badge-price">
                                    {{ $price->price }} JD
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Stock -->
                <div class="col-md-4 mb-3">
                    <div class="info-card">
                        <div class="card-header-custom" style="color: #ef4444;">
                            <i class="fas fa-boxes"></i> Stock Availability
                        </div>
                        @foreach($product->variationQuantities as $variation)
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span style="color: rgba(255,255,255,0.6);">
                                    {{ $variation->color->name_en }}
                                    -
                                    {{ $variation->size->name_en }}
                                </span>
                                <span class="badge-item badge-stock">
                                    <i class="fas fa-cube me-1"></i>
                                    {{ $variation->quantity }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- ===== ADD TO CART ===== -->
            <div class="cart-form-card">
                <h5 style="color: #ffc107; font-weight: 700; margin-bottom: 15px;">
                    <i class="fas fa-shopping-cart me-2"></i> Add To Cart
                </h5>

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf

                    <div class="row">
                        <!-- Color -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                <i class="fas fa-palette"></i> Color
                            </label>
                            <select name="color_id" class="form-control form-control-custom" required>
                                @foreach($product->colors as $color)
                                    <option value="{{ $color->id }}">
                                        {{ $color->name_en }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Size -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                <i class="fas fa-ruler"></i> Size
                            </label>
                            <select name="size_id" class="form-control form-control-custom" required>
                                @foreach($product->prices as $price)
                                    <option value="{{ $price->size->id }}">
                                        {{ $price->size->name_en }}
                                        -
                                        {{ $price->price }} JD
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Quantity -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                <i class="fas fa-sort-amount-up"></i> Quantity
                            </label>
                            <input type="number"
                                   name="quantity"
                                   class="form-control form-control-custom"
                                   value="1"
                                   min="1"
                                   max="99"
                                   required>
                        </div>
                    </div>

                    <button type="submit" class="btn-add-to-cart">
                        <i class="fas fa-cart-plus"></i> Add To Cart
                    </button>
                </form>
            </div>

            <!-- ===== BACK BUTTON ===== -->
            <a href="{{ route('customer.products') }}" class="btn-back-products">
                <i class="fas fa-arrow-left"></i> Back To Products
            </a>

        </div>
    </div>
</div>

<!-- ===== SCRIPTS ===== -->
<script>
    function changeMainImage(src, element) {
        const mainImage = document.getElementById('mainImage');
        mainImage.style.opacity = '0.5';
        setTimeout(() => {
            mainImage.src = src;
            mainImage.style.opacity = '1';
        }, 200);

        document.querySelectorAll('.thumbnail').forEach(thumb => {
            thumb.classList.remove('active');
        });
        element.classList.add('active');
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>