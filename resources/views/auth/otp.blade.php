<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('verify-otp') }}">
        @csrf

        <div>
            <x-label for="otp">Enter your OTP code:</x-label>
            <x-input type="text" id="otp" name="otp" required>
        </div>

        <x-button class="ml-3">{{ __('Verify') }}</x-button>
    </form>
    </x-auth-card>
</x-guest-layout>
