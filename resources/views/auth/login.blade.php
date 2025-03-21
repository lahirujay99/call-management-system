<x-guest-layout>
    <div class="login">
        <h1 class="text-center text-3xl font-bold mb-6">Login</h1>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="block text-gray-100 text-sm font-bold mb-2" />
                <x-text-input id="email" class="block w-full rounded-md border-gray-700 bg-gray-800 text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="block text-gray-100 text-sm font-bold mb-2" />

                <x-text-input id="password" class="block w-full rounded-md border-gray-700 bg-gray-800 text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Remember Me -->
            <div class="mt-4">
                <label for="remember_me" class="inline-flex items-center"> {{-- Keep inline-flex for checkbox and text in a row --}}
                    <input id="remember_me" type="checkbox" class="rounded border-gray-600 bg-gray-700 text-indigo-600 focus:ring-indigo-500 align-middle" name="remember" style="position: relative; top: 4px;"> {{-- Adjusted top to 1px (positive value) --}}
                    <span class="ml-2 text-sm text-gray-300" style="white-space: nowrap;">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Forgot Password Link -->
            <div class="mt-4"> {{-- Align Forgot password to the right if desired, otherwise remove text-right --}}
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-gray-300 hover:text-gray-100"> {{ __('Forgot your password? Click here') }} </a>
                @endif
            </div>

            <!-- Login Button -->
            <div class="mt-4">
                <button type="submit" class="w-full bg-white hover:bg-gray-900 text-black hover:text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-opacity-50 text-center"> {{-- Replaced x-primary-button with button, kept all classes --}}
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
