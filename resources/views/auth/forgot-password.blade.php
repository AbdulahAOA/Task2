<x-guest-layout>
    <style>
        .auth-label {
            color: #ffc107;
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 0.9rem;
        }
        .auth-input {
            background: rgba(255, 255, 255, 0.06) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 12px !important;
            padding: 12px 16px !important;
            color: #fff !important;
            width: 100%;
            transition: all 0.3s;
        }
        .auth-input:focus {
            background: rgba(255, 255, 255, 0.1) !important;
            border-color: #ffc107 !important;
            box-shadow: 0 0 30px rgba(255, 193, 7, 0.1) !important;
            color: #fff !important;
            outline: none !important;
        }
        .auth-input::placeholder { color: rgba(255, 255, 255, 0.3) !important; }
        .auth-btn {
            background: linear-gradient(135deg, #ffc107, #f59e0b) !important;
            border: none !important;
            padding: 12px 30px !important;
            border-radius: 12px !important;
            font-weight: 700 !important;
            color: #1a1a2e !important;
            transition: all 0.3s;
        }
        .auth-btn:hover {
            transform: scale(1.02);
            box-shadow: 0 0 40px rgba(255, 193, 7, 0.3);
            color: #1a1a2e !important;
        }
        .auth-description {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.95rem;
            margin-bottom: 20px;
        }
        .auth-status {
            color: #22c55e;
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 15px;
        }
    </style>

    <div class="auth-description">
        🔑 Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.
    </div>

    <x-auth-session-status class="auth-status" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <label class="auth-label">📧 Email</label>
            <input id="email"
                   class="auth-input"
                   type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autofocus
                   placeholder="Enter your email">
            @error('email')
                <div style="color: #ef4444; font-size: 0.85rem; margin-top: 4px;">❌ {{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="auth-btn">
                📧 Send Reset Link
            </button>
        </div>
    </form>
</x-guest-layout>