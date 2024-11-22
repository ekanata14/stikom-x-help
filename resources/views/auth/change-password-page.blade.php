<x-guest-layout>
    <x-auth-card>
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.change') }}">
            @csrf

            <input type="hidden" name="email" value="{{ $email }}">

            {{-- <div class="grid gap-6">
                <!-- Email Address -->
                <div class="space-y-2">
                    <x-form.label
                        for="email"
                        :value="__('Email')"
                    />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input
                            withicon
                            id="email"
                            class="block w-full"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            placeholder="{{ __('Email') }}"
                        />
                    </x-form.input-with-icon-wrapper>
                </div> --}}
            <div class="grid gap-6">
                <div class="flex gap-1">
                    <x-form.label for="password" :value="__('Password (Min: 8 Characters)')" />
                    <span class="text-red-500">*</span>
                </div>

                <x-form.input-with-icon-wrapper>
                    <x-slot name="icon">
                        <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                    </x-slot>

                    <x-form.input withicon id="password" class="block w-full" type="password" name="password" required
                        autocomplete="new-password" placeholder="{{ __('********') }}" required />
                </x-form.input-with-icon-wrapper>
            </div>
            <div class="mt-4">
                <x-button class="justify-center w-full">
                    {{ __('Change Password') }}
                </x-button>
            </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
