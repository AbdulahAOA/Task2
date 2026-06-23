<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-folder fa-lg me-2"></i>
            <span>Categories Management</span>
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
        }
        .glass-card .card-header {
            background: linear-gradient(135deg, #ffc107, #f59e0b) !important;
            padding: 18px 25px;
            border: none;
            border-radius: 24px 24px 0 0 !important;
        }
        .glass-card .card-header h4 {
            color: #1a1a2e;
            font-weight: 800;
            margin: 0;
            font-size: 1.2rem;
        }
        .glass-card .card-header h4 i { margin-right: 10px; }
        .glass-card .card-body { padding: 25px; color: #fff; }

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

        .table-glass {
            color: #e0e0e0;
            margin: 0;
        }
        .table-glass thead th {
            border-bottom: 2px solid #ffc107;
            color: #ffc107;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.8px;
            padding: 14px 12px;
            background: transparent;
        }
        .table-glass tbody td {
            vertical-align: middle;
            padding: 14px 12px;
            border-color: rgba(255, 255, 255, 0.05);
        }
        .table-glass tbody tr { transition: all 0.3s; }
        .table-glass tbody tr:hover { background: rgba(255, 193, 7, 0.04); }

        .badge-status {
            padding: 5px 14px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.75rem;
        }
        .badge-status.bg-success { background: rgba(34, 197, 94, 0.2) !important; color: #22c55e; }
        .badge-status.bg-danger { background: rgba(239, 68, 68, 0.2) !important; color: #ef4444; }

        .btn-edit {
            background: rgba(255, 193, 7, 0.15);
            border: 1px solid rgba(255, 193, 7, 0.2);
            color: #ffc107;
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 0.85rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-edit:hover {
            background: rgba(255, 193, 7, 0.25);
            color: #ffc107;
            transform: scale(1.05);
        }
        .btn-edit i { margin-right: 4px; }

        .btn-delete {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #ef4444;
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 0.85rem;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }
        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.25);
            color: #ef4444;
            transform: scale(1.05);
        }
        .btn-delete i { margin-right: 4px; }

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
            padding: 40px 20px;
        }
        .empty-state i {
            font-size: 4rem;
            color: rgba(255, 193, 7, 0.2);
            display: block;
            margin-bottom: 15px;
        }
        .empty-state h5 { color: #fff; font-weight: 700; }
        .empty-state p { color: rgba(255, 255, 255, 0.4); }

        @media (max-width: 768px) {
            .glass-card .card-body { padding: 18px; }
            .page-header h2 { font-size: 1.3rem; }
            .btn-glass-primary { padding: 8px 16px; font-size: 0.85rem; }
        }
    </style>

    <div class="container mt-4">
        <div class="page-header d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h2>
                <i class="fa-solid fa-folder"></i> Categories List
            </h2>
            <a href="{{ route('categories.create') }}" class="btn-glass-primary">
                <i class="fa-solid fa-plus"></i> Create Category
            </a>
        </div>

        @if(session('success'))
            <div class="alert-glass-success alert-dismissible fade show mb-3">
                <i class="fa-regular fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="glass-card card">
            <div class="card-header">
                <h4><i class="fa-solid fa-list"></i> All Categories</h4>
            </div>
            <div class="card-body">
                @if($categories->count())
                    <div class="table-responsive">
                        <table class="table table-glass">
                            <thead>
                                <tr>
                                    <th><i class="fa-regular fa-hashtag me-1"></i> ID</th>
                                    <th><i class="fa-regular fa-code me-1"></i> Code</th>
                                    <th><i class="fa-regular fa-tag me-1"></i> Name</th>
                                    <th><i class="fa-regular fa-circle-check me-1"></i> Status</th>
                                    <th width="200"><i class="fa-regular fa-wrench me-1"></i> Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>#{{ $category->id }}</td>
                                        <td><span style="color: #ffc107; font-weight: 600;">{{ $category->code }}</span></td>
                                        <td>{{ $category->name_en }}</td>
                                        <td>
                                            @if($category->status == 1)
                                                <span class="badge-status bg-success">
                                                    <i class="fa-regular fa-circle-check me-1"></i> Active
                                                </span>
                                            @else
                                                <span class="badge-status bg-danger">
                                                    <i class="fa-regular fa-circle-xmark me-1"></i> Inactive
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn-edit">
                                                <i class="fa-regular fa-pen-to-square"></i> Edit
                                            </a>
                                            <form action="{{ route('categories.destroy', $category->id) }}"
                                                  method="POST" style="display:inline;"
                                                  onsubmit="return confirm('Are you sure you want to delete this category?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete">
                                                    <i class="fa-regular fa-trash-can"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fa-regular fa-folder-open"></i>
                        <h5>No Categories Found</h5>
                        <p>Start by creating your first category</p>
                        <a href="{{ route('categories.create') }}" class="btn-glass-primary" style="margin-top:10px;">
                            <i class="fa-solid fa-plus"></i> Create Category
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>