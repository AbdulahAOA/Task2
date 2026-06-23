<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-box fa-lg me-2"></i>
            <span>Products Management</span>
        </div>
    </x-slot>

    <style>
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e) !important;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1a1a2e; }
        ::-webkit-scrollbar-thumb { background: #ffc107; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #f59e0b; }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6);
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
        }
        .glass-card:hover {
            transform: translateY(-8px);
            border-color: rgba(255, 193, 7, 0.2);
            box-shadow: 0 30px 60px rgba(255, 193, 7, 0.1);
        }
        .glass-card .card-img-top {
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid rgba(255, 193, 7, 0.1);
        }
        .glass-card .card-body {
            padding: 20px;
            color: #fff;
        }
        .glass-card .card-title {
            color: #ffc107;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 8px;
        }
        .glass-card .card-text {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            margin-bottom: 15px;
            min-height: 40px;
        }
        .glass-card .card-footer {
            background: rgba(255, 255, 255, 0.03) !important;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding: 15px 20px;
        }

        .btn-glass-success {
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #22c55e;
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 0.8rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-glass-success:hover {
            background: rgba(34, 197, 94, 0.25);
            border-color: #22c55e;
            color: #22c55e;
            transform: scale(1.05);
        }

        .btn-glass-warning {
            background: rgba(255, 193, 7, 0.15);
            border: 1px solid rgba(255, 193, 7, 0.2);
            color: #ffc107;
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 0.8rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-glass-warning:hover {
            background: rgba(255, 193, 7, 0.25);
            color: #ffc107;
            transform: scale(1.05);
        }

        .btn-glass-danger {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #ef4444;
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 0.8rem;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }
        .btn-glass-danger:hover {
            background: rgba(239, 68, 68, 0.25);
            color: #ef4444;
            transform: scale(1.05);
        }

        .btn-glass-primary {
            background: rgba(59, 130, 246, 0.15);
            border: 1px solid rgba(59, 130, 246, 0.3);
            color: #60a5fa;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-glass-primary:hover {
            background: rgba(59, 130, 246, 0.25);
            border-color: #3b82f6;
            color: #60a5fa;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.15);
        }
        .btn-glass-primary i { margin-right: 8px; }

        .alert-glass-success {
            background: rgba(34, 197, 94, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(34, 197, 94, 0.2);
            border-radius: 12px;
            color: #22c55e;
            padding: 12px 16px;
        }
        .alert-glass-success .btn-close { filter: invert(1) brightness(2); }

        .page-header h2 {
            color: #ffc107;
            font-weight: 800;
            text-shadow: 0 0 30px rgba(255, 193, 7, 0.15);
        }
        .page-header h2 i { margin-right: 12px; }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }
        .empty-state i {
            font-size: 4rem;
            color: rgba(255, 193, 7, 0.2);
            display: block;
            margin-bottom: 15px;
        }
        .empty-state h5 { color: #fff; font-weight: 700; }
        .empty-state p { color: rgba(255, 255, 255, 0.4); }

        .badge-status {
            padding: 4px 12px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.7rem;
        }
        .badge-status.bg-success { background: rgba(34, 197, 94, 0.2) !important; color: #22c55e; }
        .badge-status.bg-danger { background: rgba(239, 68, 68, 0.2) !important; color: #ef4444; }

        @media (max-width: 768px) {
            .glass-card .card-img-top { height: 150px; }
            .page-header h2 { font-size: 1.3rem; }
        }
    </style>

    <div class="container mt-4">
        <div class="page-header d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h2>
                <i class="fa-solid fa-boxes"></i> Products List
            </h2>
            <a href="{{ route('products.create') }}" class="btn-glass-primary">
                <i class="fa-solid fa-plus"></i> Create Product
            </a>
        </div>

        @if(session('success'))
            <div class="alert-glass-success alert-dismissible fade show mb-3">
                <i class="fa-regular fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($products->count())
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="glass-card card">
                            @if($product->images->count())
                                <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                                     class="card-img-top"
                                     alt="{{ $product->name_en }}">
                            @else
                                <img src="https://via.placeholder.com/400x200?text=No+Image"
                                     class="card-img-top"
                                     alt="No Image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name_en }}</h5>
                                <p class="card-text">{{ Str::limit($product->description_en, 60) }}</p>
                                <div>
                                    @if($product->status == 1)
                                        <span class="badge-status bg-success">
                                            <i class="fa-regular fa-circle-check me-1"></i> Active
                                        </span>
                                    @else
                                        <span class="badge-status bg-danger">
                                            <i class="fa-regular fa-circle-xmark me-1"></i> Inactive
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('store.product', $product->id) }}" class="btn-glass-success">
                                    <i class="fa-regular fa-eye"></i> View
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn-glass-warning">
                                    <i class="fa-regular fa-pen-to-square"></i> Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}"
                                      method="POST" style="display:inline;"
                                      onsubmit="return confirm('Delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-glass-danger">
                                        <i class="fa-regular fa-trash-can"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="glass-card card">
                <div class="card-body">
                    <div class="empty-state">
                        <i class="fa-regular fa-box-open"></i>
                        <h5>No Products Found</h5>
                        <p>Start by creating your first product</p>
                        <a href="{{ route('products.create') }}" class="btn-glass-primary" style="margin-top:10px;">
                            <i class="fa-solid fa-plus"></i> Create Product
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>