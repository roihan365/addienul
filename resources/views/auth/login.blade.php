<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" type="text" name="username" :value="old('username')" required autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="form-check">
                <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label text-dark" for="flexCheckChecked">
                    {{ __('Remeber this Device') }}
                </label>
            </div>
            @if (Route::has('password.request'))
                <a class="text-primary fw-bold" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
            @endif
        </div>


        <x-primary-button class="w-100 py-8 fs-4 mb-4 ">
            {{ __('Log in') }}
        </x-primary-button>

        {{-- <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
            <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Create an account</a>
        </div> --}}
    </form>
</x-guest-layout>
