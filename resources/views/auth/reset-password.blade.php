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
        .error-text { color: #ef4444; font-size: 0.85rem; margin-top: 4px; }
    </style>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        {{-- Email --}}
        <div>
            <label class="auth-label">📧 Email</label>
            <input id="email"
                   class="auth-input"
                   type="email"
                   name="email"
                   value="{{ old('email', $request->email) }}"
                   required
                   autofocus
                   placeholder="Enter your email">
            @error('email')
                <div class="error-text">❌ {{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mt-4">
            <label class="auth-label">🔒 New Password</label>
            <input id="password"
                   class="auth-input"
                   type="password"
                   name="password"
                   required
                   placeholder="Enter new password">
            @error('password')
                <div class="error-text">❌ {{ $message }}</div>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="mt-4">
            <label class="auth-label">✅ Confirm Password</label>
            <input id="password_confirmation"
                   class="auth-input"
                   type="password"
                   name="password_confirmation"
                   required
                   placeholder="Confirm new password">
            @error('password_confirmation')
                <div class="error-text">❌ {{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="auth-btn">
                🔄 Reset Password
            </button>
        </div>
    </form>
</x-guest-layout>