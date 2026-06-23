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
        .error-text { color: #ef4444; font-size: 0.85rem; margin-top: 4px; }
    </style>

    <div class="auth-description">
        🔐 This is a secure area. Please confirm your password before continuing.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div>
            <label class="auth-label">🔒 Password</label>
            <input id="password"
                   class="auth-input"
                   type="password"
                   name="password"
                   required
                   autocomplete="current-password"
                   placeholder="Enter your password">
            @error('password')
                <div class="error-text">❌ {{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="auth-btn">
                ✅ Confirm
            </button>
        </div>
    </form>
</x-guest-layout>