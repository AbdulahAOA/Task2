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
        .auth-link {
            color: rgba(255, 255, 255, 0.5) !important;
            text-decoration: none !important;
            transition: all 0.3s;
        }
        .auth-link:hover { color: #ffc107 !important; }
        .auth-checkbox {
            accent-color: #ffc107;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        .auth-checkbox-label {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }
        .error-text { color: #ef4444; font-size: 0.85rem; margin-top: 4px; }
    </style>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email Or Phone --}}
        <div>
            <label class="auth-label">📧 Email Or Phone</label>
            <input id="login"
                   class="auth-input"
                   type="text"
                   name="login"
                   value="{{ old('login') }}"
                   required
                   autofocus
                   placeholder="Enter email or phone">
            @error('login')
                <div class="error-text">❌ {{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mt-4">
            <label class="auth-label">🔒 Password</label>
            <input id="password"
                   class="auth-input"
                   type="password"
                   name="password"
                   required
                   autocomplete="current-password"
                   placeholder="Enter password">
            @error('password')
                <div class="error-text">❌ {{ $message }}</div>
            @enderror
        </div>

        {{-- Remember Me --}}
        <div class="block mt-4">
            <label class="inline-flex items-center">
                <input type="checkbox"
                       class="auth-checkbox"
                       name="remember">
                <span class="ms-2 auth-checkbox-label">✅ Remember me</span>
            </label>
        </div>

        {{-- Buttons --}}
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="auth-link" href="{{ route('password.request') }}">
                    🔑 Forgot your password?
                </a>
            @endif
            <button type="submit" class="auth-btn">
                🚀 LOGIN
            </button>
        </div>

        {{-- Customer Login Link --}}
        <div class="mt-4 text-center">
            <a href="/customer-login"
               style="color: #ffc107; text-decoration: none; font-weight: 600; padding: 8px 20px; border: 1px solid #ffc107; border-radius: 12px; display: inline-block; transition: all 0.3s;"
               onmouseover="this.style.background='rgba(255,193,7,0.1)'"
               onmouseout="this.style.background='transparent'">
                👤 Customer Login
            </a>
        </div>
    </form>
</x-guest-layout>