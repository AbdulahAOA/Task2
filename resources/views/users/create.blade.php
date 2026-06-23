<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <span style="font-size: 1.2rem; margin-right: 8px;">👤</span>
            <span>Create User</span>
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

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6);
            overflow: hidden;
            max-width: 600px;
            margin: 35px auto;
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
        .glass-card .card-body { padding: 25px; color: #fff; }

        .form-label-custom {
            color: #ffc107;
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 0.9rem;
        }
        .form-label-custom span { margin-right: 6px; }

        .form-control-custom {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 12px 16px;
            color: #fff;
            transition: all 0.3s;
            width: 100%;
        }
        .form-control-custom:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #ffc107;
            box-shadow: 0 0 30px rgba(255, 193, 7, 0.1);
            color: #fff;
            outline: none;
        }
        .form-control-custom::placeholder { color: rgba(255, 255, 255, 0.3); }
        .form-control-custom option { background: #1a1a2e; color: #fff; }

        .btn-save {
            background: linear-gradient(135deg, #ffc107, #f59e0b);
            border: none;
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            color: #1a1a2e;
            transition: all 0.3s;
            cursor: pointer;
            width: 100%;
        }
        .btn-save:hover {
            transform: scale(1.02);
            box-shadow: 0 0 40px rgba(255, 193, 7, 0.3);
            color: #1a1a2e;
        }
        .btn-save span { margin-right: 8px; }

        .btn-back {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 10px 24px;
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
        .btn-back span { margin-right: 8px; }

        .alert-glass-danger {
            background: rgba(239, 68, 68, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 12px;
            color: #ef4444;
            padding: 12px 16px;
        }
        .alert-glass-danger ul { margin: 5px 0 0 0; padding-left: 20px; }

        @media (max-width: 768px) {
            .glass-card { margin: 20px 15px; }
            .glass-card .card-body { padding: 18px; }
        }
    </style>

    <div class="container mt-4">
        <div class="glass-card card">
            <div class="card-header">
                <h4><span style="margin-right: 8px;">👤</span> Create New User</h4>
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class="alert-glass-danger alert-dismissible fade show mb-3">
                        <span style="margin-right: 8px;">❌</span>
                        <strong>Please fix:</strong>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-3">
                        <label class="form-label-custom">
                            <span>👤</span> Name
                        </label>
                        <input type="text"
                               name="name"
                               class="form-control-custom"
                               placeholder="Enter user name"
                               value="{{ old('name') }}"
                               required>
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label class="form-label-custom">
                            <span>📧</span> Email
                        </label>
                        <input type="email"
                               name="email"
                               class="form-control-custom"
                               placeholder="Enter email address"
                               value="{{ old('email') }}"
                               required>
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label class="form-label-custom">
                            <span>🔒</span> Password
                        </label>
                        <input type="password"
                               name="password"
                               class="form-control-custom"
                               placeholder="Enter password (min 6 characters)"
                               required>
                    </div>

                    {{-- Password Confirmation --}}
                    <div class="mb-4">
                        <label class="form-label-custom">
                            <span>✅</span> Confirm Password
                        </label>
                        <input type="password"
                               name="password_confirmation"
                               class="form-control-custom"
                               placeholder="Confirm password"
                               required>
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ route('users.index') }}" class="btn-back">
                            <span>⬅️</span> Back
                        </a>
                        <button type="submit" class="btn-save">
                            <span>💾</span> Save User
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>