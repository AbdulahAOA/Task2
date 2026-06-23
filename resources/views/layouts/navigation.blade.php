
@if(Auth::check())
<nav style="
    background: rgba(0, 0, 0, 0.88) !important;
    backdrop-filter: blur(15px);
    border-bottom: 2px solid #ffc107;
    padding: 12px 0;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
">
    <div class="container">

        <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:15px;">

            {{-- Brand --}}
            <a href="{{ route('dashboard') }}"
               style="color: #ffc107; text-decoration: none; font-weight: 800; font-size: 1.4rem;">
                🏪 Product System
            </a>

            {{-- Nav Links --}}
            <div style="display:flex; gap:12px; flex-wrap:wrap; align-items:center;">

                <a href="{{ route('dashboard') }}"
                   style="color: rgba(255,255,255,0.7); text-decoration:none; padding:6px 12px; border-radius:8px; font-weight:500;">
                    📊 Dashboard
                </a>

                <div class="dropdown">
                    <a href="#"
                       data-bs-toggle="dropdown"
                       style="color: rgba(255,255,255,0.7); text-decoration:none; padding:6px 12px; border-radius:8px; font-weight:500;">
                        📦 Catalog ▼
                    </a>

                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('products.index') }}">
                                Products
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('categories.index') }}">
                                Categories
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('colors.index') }}">
                                Colors
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('sizes.index') }}">
                                Sizes
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="dropdown">
                    <a href="#"
                       data-bs-toggle="dropdown"
                       style="color: rgba(255,255,255,0.7); text-decoration:none; padding:6px 12px; border-radius:8px; font-weight:500;">
                        👥 People ▼
                    </a>

                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('users.index') }}">
                                Users
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('customers.index') }}">
                                Customers
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="dropdown">
                    <a href="#"
                       data-bs-toggle="dropdown"
                       style="color: rgba(255,255,255,0.7); text-decoration:none; padding:6px 12px; border-radius:8px; font-weight:500;">
                        💰 Sales ▼
                    </a>

                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('orders.index') }}">
                                Orders
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('coupons.index') }}">
                                Coupons
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            {{-- User & Logout --}}
            <div style="display:flex; align-items:center; gap:12px;">

                @if(Auth::check())
                    <span style="color:#ffc107; font-weight:600;">
                        👤 {{ Auth::user()->name }}
                    </span>
                @endif

                <form method="POST"
                      action="{{ route('logout') }}"
                      style="margin:0;">
                    @csrf

                    <button type="submit"
                            style="
                                background: rgba(239, 68, 68, 0.15);
                                border: 1px solid rgba(239, 68, 68, 0.2);
                                color: #ef4444;
                                padding: 6px 16px;
                                border-radius: 8px;
                                font-weight: 600;
                                cursor: pointer;
                            ">
                        🚪 Logout
                    </button>
                </form>

            </div>

        </div>

    </div>
</nav>
@endif