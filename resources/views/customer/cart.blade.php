<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🛒 My Cart</title>
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
        }
        .nav-link-custom:hover {
            color: #ffc107 !important;
            background: rgba(255, 193, 7, 0.1);
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
            transition: all 0.3s;
        }
        .btn-logout:hover {
            background: rgba(255, 107, 107, 0.15) !important;
        }
        .btn-logout i { margin-right: 8px; }

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
            display: flex;
            align-items: center;
            justify-content: space-between;
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

        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid rgba(255, 193, 7, 0.2);
        }

        .btn-qty {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: none;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        .btn-qty.btn-minus {
            background: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }
        .btn-qty.btn-minus:hover {
            background: #ffc107;
            color: #1a1a2e;
            transform: scale(1.1);
        }
        .btn-qty.btn-plus {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
        }
        .btn-qty.btn-plus:hover {
            background: #22c55e;
            color: #fff;
            transform: scale(1.1);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            border: none;
            transition: all 0.3s;
        }
        .btn-delete:hover {
            background: #ef4444;
            color: #fff;
            transform: scale(1.1);
            box-shadow: 0 0 30px rgba(239, 68, 68, 0.3);
        }

        .total-box {
            background: linear-gradient(135deg, #ffc107, #f59e0b);
            border-radius: 16px;
            padding: 25px;
            color: #1a1a2e;
        }
        .total-box h5 { font-weight: 800; margin-bottom: 15px; }
        .total-box .total-amount { font-size: 1.8rem; font-weight: 800; }
        .total-box select {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 10px;
            padding: 10px 14px;
            width: 100%;
        }
        .btn-checkout {
            background: #1a1a2e !important;
            color: #ffc107 !important;
            border: none !important;
            padding: 14px;
            border-radius: 12px;
            font-weight: 700;
            width: 100%;
            transition: all 0.3s;
        }
        .btn-checkout:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }
        .btn-add-address {
            background: #ef4444 !important;
            color: #fff !important;
            border: none !important;
            padding: 14px;
            border-radius: 12px;
            font-weight: 700;
            width: 100%;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.3s;
        }
        .btn-add-address:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 40px rgba(239, 68, 68, 0.3);
            color: #fff !important;
        }

        .coupon-box {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            padding: 20px;
            height: 100%;
        }
        .coupon-box h5 { color: #ffc107; font-weight: 700; }
        .input-glow {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 193, 7, 0.15);
            color: #fff;
            border-radius: 12px;
            padding: 10px 16px;
        }
        .input-glow:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #ffc107;
            box-shadow: 0 0 30px rgba(255, 193, 7, 0.1);
            color: #fff;
            outline: none;
        }
        .btn-apply {
            background: #ffc107;
            color: #1a1a2e;
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 700;
            transition: all 0.3s;
        }
        .btn-apply:hover {
            transform: scale(1.03);
            box-shadow: 0 0 30px rgba(255, 193, 7, 0.3);
        }

        .empty-cart {
            text-align: center;
            padding: 60px 20px;
        }
        .empty-cart i {
            font-size: 4rem;
            color: #ffc107;
            opacity: 0.4;
            display: block;
            margin-bottom: 20px;
        }
        .empty-cart h3 { color: #fff; font-weight: 700; }
        .empty-cart p { color: rgba(255, 255, 255, 0.5); }
        .btn-browse {
            background: linear-gradient(135deg, #ffc107, #f59e0b);
            border: none;
            padding: 12px 40px;
            border-radius: 50px;
            font-weight: 700;
            color: #1a1a2e;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }
        .btn-browse:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 40px rgba(255, 193, 7, 0.3);
            color: #1a1a2e;
        }

        .alert-glass {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 12px 16px;
        }
        .alert-glass.alert-success {
            border-color: rgba(34, 197, 94, 0.3);
            color: #22c55e;
        }
        .alert-glass.alert-danger {
            border-color: rgba(239, 68, 68, 0.3);
            color: #ef4444;
        }

        @media (max-width: 768px) {
            .navbar-brand { font-size: 1.1rem; }
            .nav-link-custom { padding: 6px 12px !important; font-size: 0.85rem; }
            .glass-card .card-header { flex-direction: column; align-items: flex-start; gap: 10px; }
            .glass-card .card-body { padding: 18px; }
            .table-glass thead th { font-size: 0.6rem; padding: 10px 6px; }
            .table-glass tbody td { padding: 10px 6px; font-size: 0.8rem; }
            .product-img { width: 45px; height: 45px; }
            .total-box { margin-top: 20px; }
        }
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
                <li class="nav-item"><a class="nav-link nav-link-custom" href="{{ route('customer.home') }}"><i class="fas fa-home"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link nav-link-custom" href="{{ route('customer.products') }}"><i class="fas fa-box"></i> Products</a></li>
                <li class="nav-item"><a class="nav-link nav-link-custom active" href="{{ route('customer.cart') }}"><i class="fas fa-shopping-cart"></i> Cart</a></li>
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
    <div class="glass-card card">
        <div class="card-header">
            <h4><i class="fas fa-shopping-cart"></i> My Shopping Cart</h4>
            @if($cart && $cart->items->count())
                <span style="color: #1a1a2e; font-weight: 700; background: rgba(26,26,46,0.2); padding: 4px 14px; border-radius: 50px; font-size: 0.85rem;">
                    <i class="fas fa-boxes me-1"></i> {{ $cart->items->count() }} items
                </span>
            @endif
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert-glass alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert-glass alert-danger alert-dismissible fade show">
                    <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($cart && $cart->items->count())
                <div class="table-responsive">
                    <table class="table table-glass">
                        <thead>
                            <tr>
                                <th><i class="fas fa-image me-1"></i> Image</th>
                                <th><i class="fas fa-tag me-1"></i> Product</th>
                                <th><i class="fas fa-palette me-1"></i> Color</th>
                                <th><i class="fas fa-ruler me-1"></i> Size</th>
                                <th><i class="fas fa-money-bill-wave me-1"></i> Price</th>
                                <th><i class="fas fa-sort-amount-up me-1"></i> Qty</th>
                                <th><i class="fas fa-calculator me-1"></i> Subtotal</th>
                                <th><i class="fas fa-trash me-1"></i> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart->items as $item)
                                <tr>
                                    <td>
                                        @if($item->product->images->count())
                                            <img src="{{ asset('storage/' . $item->product->images->first()->image) }}" class="product-img">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('customer.product', $item->product->id) }}" style="color: #ffc107; text-decoration: none; font-weight: 600;">
                                            {{ $item->product->name_en }}
                                        </a>
                                    </td>
                                    <td>{{ $item->color?->name_en ?? '-' }}</td>
                                    <td>{{ $item->size?->name_en ?? '-' }}</td>
                                    <td><strong>{{ $item->price }}</strong> JD</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <button class="btn-qty btn-minus decrease-btn" data-id="{{ $item->id }}"><i class="fas fa-minus"></i></button>
                                            <span class="quantity-text" data-id="{{ $item->id }}" style="font-weight:700; min-width:25px; text-align:center;">{{ $item->quantity }}</span>
                                            <button class="btn-qty btn-plus increase-btn" data-id="{{ $item->id }}"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td class="subtotal" data-id="{{ $item->id }}" data-price="{{ $item->price }}" style="color:#ffc107; font-weight:600;">
                                        {{ $item->price * $item->quantity }} JD
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn-delete"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @php
                    $total = $cart->items->sum(function ($item) {
                        return $item->price * $item->quantity;
                    });
                @endphp

                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="coupon-box">
                            <h5><i class="fas fa-gift me-2"></i> Coupon Code</h5>
                            <div class="input-group">
                                <input type="text" id="coupon-code" class="form-control input-glow" placeholder="Enter coupon code">
                                <button type="button" id="apply-coupon" class="btn-apply"><i class="fas fa-check me-1"></i> Apply</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="total-box">
                            <h5><i class="fas fa-receipt me-2"></i> Order Summary</h5>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span style="font-weight:600;">Total:</span>
                                <span class="total-amount" id="cart-total">{{ $total }} JD</span>
                            </div>
                            <hr class="border-dark opacity-25">
                            <div class="mb-3">
                                <label style="font-weight:700;"><i class="fas fa-map-pin me-1"></i> Select Address</label>
                                <select name="address_id" form="checkout-form" class="form-select" required>
                                    <option value="">Choose an address...</option>
                                    @foreach($addresses ?? [] as $address)
                                        <option value="{{ $address->id }}">{{ $address->title }} - {{ $address->address }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <form id="checkout-form" action="{{ route('checkout') }}" method="POST">
                                @csrf
                                @if(isset($addresses) && $addresses->count())
                                    <button type="submit" class="btn-checkout"><i class="fas fa-credit-card me-2"></i> Proceed to Checkout</button>
                                @else
                                    <a href="{{ route('customer.addresses') }}" class="btn-add-address"><i class="fas fa-plus-circle me-2"></i> Add Address First</a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>

            @else
                <div class="empty-cart">
                    <i class="fas fa-shopping-basket"></i>
                    <h3>Your cart is empty</h3>
                    <p>Browse our products and add your favorites!</p>
                    <a href="{{ route('customer.products') }}" class="btn-browse"><i class="fas fa-shopping-bag me-2"></i> Browse Products</a>
                </div>
            @endif

        </div>
    </div>
</div>

<script>
    // Increase Quantity
    document.querySelectorAll('.increase-btn').forEach(button => {
        button.addEventListener('click', function() {
            fetch('/cart/increase/' + this.dataset.id, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            })
            .then(response => response.json())
            .then(data => {
                document.querySelector('.quantity-text[data-id="' + button.dataset.id + '"]').innerText = data.quantity;
                const subtotalCell = document.querySelector('.subtotal[data-id="' + button.dataset.id + '"]');
                const price = parseFloat(subtotalCell.dataset.price);
                subtotalCell.innerText = (price * data.quantity) + ' JD';
                document.getElementById('cart-total').innerText = data.total + ' JD';
            });
        });
    });

    // Decrease Quantity
    document.querySelectorAll('.decrease-btn').forEach(button => {
        button.addEventListener('click', function() {
            fetch('/cart/decrease/' + this.dataset.id, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            })
            .then(response => response.json())
            .then(data => {
                document.querySelector('.quantity-text[data-id="' + button.dataset.id + '"]').innerText = data.quantity;
                const subtotalCell = document.querySelector('.subtotal[data-id="' + button.dataset.id + '"]');
                const price = parseFloat(subtotalCell.dataset.price);
                subtotalCell.innerText = (price * data.quantity) + ' JD';
                document.getElementById('cart-total').innerText = data.total + ' JD';
            });
        });
    });

    // Apply Coupon
    document.getElementById('apply-coupon').addEventListener('click', function() {
        fetch('/coupon/check', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ code: document.getElementById('coupon-code').value })
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert('❌ ' + data.message);
                return;
            }
            alert('✅ Coupon Applied Successfully!');
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>