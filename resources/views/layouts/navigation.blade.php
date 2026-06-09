<nav x-data="{ open: false }" class="bg-dark shadow">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center py-3">

            <div class="d-flex align-items-center gap-4">

                <a href="{{ route('dashboard') }}"
                   class="text-warning text-decoration-none fw-bold fs-4">
                    <i class="fa-solid fa-store"></i>
                    Product System
                </a>

                <div class="d-none d-md-flex gap-4">

                    <a href="{{ route('dashboard') }}"
                       class="text-light text-decoration-none">
                        <i class="fa-solid fa-gauge"></i>
                        Dashboard
                    </a>

                    <a href="{{ route('store.home') }}"
                       class="text-light text-decoration-none">
                        <i class="fa-solid fa-shop"></i>
                        Store
                    </a>

                    <a href="{{ route('products.index') }}"
                       class="text-light text-decoration-none">
                        <i class="fa-solid fa-box"></i>
                        Products
                    </a>

                    <a href="{{ route('categories.index') }}"
                       class="text-light text-decoration-none">
                        <i class="fa-solid fa-folder"></i>
                        Categories
                    </a>

                    <a href="{{ route('colors.index') }}"
                       class="text-light text-decoration-none">
                        <i class="fa-solid fa-palette"></i>
                        Colors
                    </a>

                    <a href="{{ route('sizes.index') }}"
                       class="text-light text-decoration-none">
                        <i class="fa-solid fa-ruler"></i>
                        Sizes
                    </a>

                    <a href="{{ route('users.index') }}"
                       class="text-light text-decoration-none">
                        <i class="fa-solid fa-users"></i>
                        Users
                    </a>

                    <a href="{{ route('customers.index') }}"
                       class="text-light text-decoration-none">
                        <i class="fa-solid fa-user-group"></i>
                        Customers
                    </a>

                </div>

            </div>

            <div class="d-flex align-items-center gap-3">

                @if(Auth::check())

                    <span class="text-warning fw-bold">

                        <i class="fa-solid fa-user"></i>

                        {{ Auth::user()->name }}

                    </span>

                @endif

                <form method="POST"
                      action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="btn btn-danger btn-sm"
                    >
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>