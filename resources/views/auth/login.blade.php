<x-guest-layout>

  

    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>

            <x-input-label
                for="login"
                :value="__('Email Or Phone')"
            />

            <x-text-input
                id="login"
                class="block mt-1 w-full"
                type="text"
                name="login"
                :value="old('login')"
                required
                autofocus
                placeholder="Enter email or phone"
            />

            <x-input-error
                :messages="$errors->get('login')"
                class="mt-2"
            />

        </div>

        <div class="mt-4">

            <x-input-label
                for="password"
                :value="__('Password')"
            />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Enter password"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />

        </div>

        <div class="block mt-4">

            <label
                for="remember_me"
                class="inline-flex items-center"
            >

                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-yellow-500 shadow-sm focus:ring-yellow-500"
                    name="remember"
                >

                <span class="ms-2 text-sm text-gray-600">
                    Remember me
                </span>

            </label>

        </div>

        <div class="flex items-center justify-between mt-6">

            @if (Route::has('password.request'))

                <a
                    class="underline text-sm text-gray-600 hover:text-yellow-500"
                    href="{{ route('password.request') }}"
                >
                    Forgot your password?
                </a>

            @endif

            <x-primary-button
                class="ms-3 bg-yellow-500 hover:bg-yellow-600"
            >
                LOGIN
            </x-primary-button>

        </div>
<div class="mt-4 text-center">

    <a
        href="/customer-login"
        class="btn btn-warning"
    >
        Customer Login
    </a>

</div>
    </form>

</x-guest-layout>