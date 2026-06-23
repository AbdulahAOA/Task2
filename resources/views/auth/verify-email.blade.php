<x-guest-layout>
    <style>
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
        .auth-btn {
            background: linear-gradient(135deg, #ffc107, #f59e0b) !important;
            border: none !important;
            padding: 10px 24px !important;
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
        .auth-link:hover { color: #ef4444 !important; }
    </style>

    <div class="auth-description">
        📧 Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="auth-status">
            ✅ A new verification link has been sent to your email address.
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="auth-btn">
                📧 Resend Verification Email
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="auth-link">
                🚪 Log Out
            </button>
        </form>
    </div>
</x-guest-layout>