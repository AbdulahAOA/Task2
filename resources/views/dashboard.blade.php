<x-app-layout>

    <x-slot name="header">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-gauge fa-lg me-2"></i>
            <span>Admin Dashboard</span>
        </div>
    </x-slot>

    <div class="container mt-5">

        <div class="row g-4">

            <div class="col-md-3">
                <div class="card text-white bg-primary shadow border-0">
                    <div class="card-body text-center">
                        <h5>
                            <i class="fa-solid fa-folder"></i>
                            Categories
                        </h5>

                        <h2>{{ $categoriesCount }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-success shadow border-0">
                    <div class="card-body text-center">
                        <h5>
                            <i class="fa-solid fa-box"></i>
                            Products
                        </h5>

                        <h2>{{ $productsCount }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-dark bg-warning shadow border-0">
                    <div class="card-body text-center">
                        <h5>
                            <i class="fa-solid fa-palette"></i>
                            Colors
                        </h5>

                        <h2>{{ $colorsCount }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-danger shadow border-0">
                    <div class="card-body text-center">
                        <h5>
                            <i class="fa-solid fa-ruler"></i>
                            Sizes
                        </h5>

                        <h2>{{ $sizesCount }}</h2>
                    </div>
                </div>
            </div>

        </div>

        <div class="card shadow border-0 mt-5">

            <div class="card-header bg-dark text-white">
                System Management
            </div>

            <div class="card-body">

                <div class="row g-3">

                    <div class="col-md-3">
                        <a href="{{ route('categories.index') }}"
                           class="btn btn-primary w-100">
                            <i class="fa-solid fa-folder"></i>
                            Categories
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('products.index') }}"
                           class="btn btn-success w-100">
                            <i class="fa-solid fa-box"></i>
                            Products
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('colors.index') }}"
                           class="btn btn-warning w-100">
                            <i class="fa-solid fa-palette"></i>
                            Colors
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('sizes.index') }}"
                           class="btn btn-danger w-100">
                            <i class="fa-solid fa-ruler"></i>
                            Sizes
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>