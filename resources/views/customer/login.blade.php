<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔐 Customer Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1a1a2e; }
        ::-webkit-scrollbar-thumb { background: #ffc107; border-radius: 10px; }

        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
            margin: 20px;
        }
        .login-card .card-header {
            background: linear-gradient(135deg, #ffc107, #f59e0b) !important;
            padding: 25px 30px;
            border: none;
            text-align: center;
        }
        .login-card .card-header h3 {
            color: #1a1a2e;
            font-weight: 800;
            margin: 0;
            font-size: 1.6rem;
        }
        .login-card .card-header h3 i { margin-right: 10px; }
        .login-card .card-body { padding: 30px; }

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

        .btn-login {
            background: linear-gradient(135deg, #ffc107, #f59e0b);
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.05rem;
            color: #1a1a2e;
            transition: all 0.3s;
            width: 100%;
        }
        .btn-login:hover {
            transform: scale(1.02);
            box-shadow: 0 0 40px rgba(255, 193, 7, 0.3);
            color: #1a1a2e;
        }
        .btn-login i { margin-right: 10px; }

        .btn-outline-custom {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            padding: 12px;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        .btn-outline-custom:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #ffc107;
            border-color: #ffc107;
        }
        .btn-outline-custom i { margin-right: 8px; }

        .divider {
            display: flex;
            align-items: center;
            gap: 15px;
            color: rgba(255, 255, 255, 0.2);
            font-size: 0.85rem;
            margin: 20px 0;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.08);
        }

        .alert-glass {
            background: rgba(239, 68, 68, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 12px;
            color: #ef4444;
            padding: 12px 16px;
        }

        .password-wrapper { position: relative; }
        .password-wrapper .form-control-custom { padding-right: 45px; }
        .password-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.4);
            cursor: pointer;
            transition: all 0.3s;
            padding: 0;
        }
        .password-toggle:hover { color: #ffc107; }

        @media (max-width: 480px) {
            .login-card { margin: 15px; }
            .login-card .card-header { padding: 18px 20px; }
            .login-card .card-header h3 { font-size: 1.3rem; }
            .login-card .card-body { padding: 20px; }
        }
    </style>
</head>
<body>

<div class="login-card card">
    <div class="card-header">
        <h3><i class="fas fa-user-lock"></i> Customer Login</h3>
    </div>
    <div class="card-body">

        @if($errors->any())
            <div class="alert-glass alert-dismissible fade show mb-3">
                <i class="fas fa-exclamation-circle me-2"></i>
                <strong>{{ $errors->first() }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3" style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.2); color: #22c55e; border-radius: 12px; padding: 12px 16px;">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ✅ IMPORTANT: @csrf MUST be included --}}
        <form action="{{ route('customer.login.submit') }}" method="POST">
            @csrf  {{-- ✅ THIS FIXES 419 ERROR --}}

            <div class="mb-3">
                <label class="form-label-custom"><i class="fas fa-envelope"></i> Email Address</label>
                <input type="email" name="email" class="form-control-custom" placeholder="Enter your email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label-custom"><i class="fas fa-lock"></i> Password</label>
                <div class="password-wrapper">
                    <input type="password" name="password" id="password" class="form-control-custom" placeholder="Enter your password" required>
                    <button type="button" class="password-toggle" onclick="togglePassword('password')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login</button>
        </form>

        <div class="divider"><span>OR</span></div>

        <a href="{{ route('customer.register.form') }}" class="btn-outline-custom">
            <i class="fas fa-user-plus"></i> Create New Account
        </a>

        <div class="mt-2">
            <a href="{{ route('login') }}" class="btn-outline-custom" style="border-color: rgba(255,255,255,0.05);">
                <i class="fas fa-user-shield"></i> Admin Login
            </a>
        </div>

    </div>
</div>

<script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const icon = field.parentElement.querySelector('.password-toggle i');
        if (field.type === 'password') {
            field.type = 'text';
            icon.className = 'fas fa-eye-slash';
        } else {
            field.type = 'password';
            icon.className = 'fas fa-eye';
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>