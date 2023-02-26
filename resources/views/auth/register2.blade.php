<x-guest-layout>
    <form method="POST" action="{{ route('patient.register.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input  class="block mt-1 w-full" type="email" value="{{$email}}"  autocomplete="username" disabled />
            <x-text-input id="email" class="block mt-1 w-full hidden" type="email" name="email"  autocomplete="username" value="{{$email}}" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

        <x-text-input id="token" class="block mt-1 w-full hidden"
                            type="text"
                            name="token" value="{{ $invitation_token }}" />
                
        <div class="mt-4">
                    <x-input-label for="role_id" value="{{ __('Register as: ') }}"></x-input-label>
                    <select class="block mt-1 w-full" disabled>
                        <option value="doctor">Doctor</option>
                        <option value="patient" selected>Patient</option>
                    </select>
                    <select name="role_id" id="role_id" class="block mt-1 w-full hidden">
                        <option value="doctor">Doctor</option>
                        <option value="patient" selected>Patient</option>
                    </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
