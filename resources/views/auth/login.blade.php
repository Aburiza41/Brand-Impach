<x-guest-layout>
    <x-slot name="foot">
        <script>
            

            // Check Email Insert
            const emailInput = document.getElementById('email');
            emailInput.addEventListener('input', (event) => {
                // console.log(event.target.value);
            
                const email = event.target.value;

                // Check Email with User Api
                const checkEmail = async (email) => {
                    try {
                        const response = await fetch(`http://localhost:8000/api/users/${email}`);
                        const data = await response.json();
                        // console.log(data);

                        // Check Email Exists or Not and Set Role
                        if (data.email) {
                            // console.log('Email Exists');
                            const is_adminInput = document.getElementById('type');
                            is_adminInput.value = data.type;
                        } else {
                            // console.log('Email Not Exists');
                            const is_adminInput = document.getElementById('type');
                            is_adminInput.value = 'Tipe User Tidak Ditemukan';
                        }
                    } catch (error) {
                        console.error('Error:', error);
                    }
                };

                checkEmail(email);

            });            
        </script>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Role --}}
        <div class="mt-4">
            <x-input-label for="type" :value="__('Role')" />
            <select id="type" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="Platform Digital">Platform Digital</option>
                <option value="Platform Manual">Platform Manual</option>
                <option value="Platform Semi Manual">Platform Semi Manual</option>
                <option value="Tipe User Tidak Ditemukan" hidden>Tipe User Tidak Ditemukan</option>
            </select>
            <x-input-error :messages="$errors->get('is_admin')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
