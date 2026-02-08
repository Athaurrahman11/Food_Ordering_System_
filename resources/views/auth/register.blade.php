<x-guest-layout>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Name') }}</label>
            <input id="name" class="block mt-1 w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-lg shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="block font-medium text-sm text-gray-700">{{ __('Email') }}</label>
            <input id="email" class="block mt-1 w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-lg shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="address" class="block font-medium text-sm text-gray-700">{{ __('Address') }}</label>
            <input id="address" class="block mt-1 w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-lg shadow-sm" type="text" name="address" :value="old('address')" required autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="phone_number" class="block font-medium text-sm text-gray-700">{{ __('Phone') }}</label>
            <input id="phone_number" class="block mt-1 w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-lg shadow-sm" type="text" name="phone_number" :value="old('phone_number')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
             <label for="password" class="block font-medium text-sm text-gray-700">{{ __('Password') }}</label>

            <input id="password" class="block mt-1 w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-lg shadow-sm"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="block font-medium text-sm text-gray-700">{{ __('Confirm Password') }}</label>

            <input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-lg shadow-sm"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <a href="{{ url('/') }}" class="ms-4 inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                {{ __('Cancel') }}
            </a>

            <button type="submit" class="ms-4 inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-500 focus:bg-orange-700 active:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>
