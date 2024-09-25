<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            <div class="flex flex-col md:flex-row w-full gap-8">
                @csrf

                <div class="grid gap-6 w-full md:w-1/2">

                    <!-- First Name -->
                    <div class="space-y-2">
                        <x-form.label for="first_name" :value="__('First Name')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="first_name" class="block w-full" type="text" name="first_name"
                                :value="old('first_name')" required autofocus placeholder="{{ __('First Name') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Last Name -->
                    <div class="space-y-2">
                        <x-form.label for="last_name" :value="__('Last Name')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="last_name" class="block w-full" type="text" name="last_name"
                                :value="old('last_name')" required placeholder="{{ __('Last Name') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Complete Name -->
                    <div class="space-y-2">
                        <x-form.label for="complete_name" :value="__('Complete Name')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="complete_name" class="block w-full" type="text"
                                name="complete_name" :value="old('complete_name')" required
                                placeholder="{{ __('Complete Name') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <x-form.label for="email" :value="__('Email')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="email" class="block w-full" type="email" name="email"
                                :value="old('email')" required placeholder="{{ __('Email') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Mobile Phone -->
                    <div class="space-y-2">
                        <x-form.label for="mobile_phone" :value="__('Mobile Phone')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-phone aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="mobile_phone" class="block w-full" type="text"
                                name="mobile_phone" :value="old('mobile_phone')" required
                                placeholder="{{ __('Mobile Phone') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    {{-- User Type --}}
                    <div class="space-y-2">
                        <x-form.label for="user_type" :value="__('Position')" />

                        <x-form.select :id="__('user_type')" :name="__('id_user_type')">
                                <option value="">{{ __('Position') }}</option>
                                @foreach ($userTypes as $userType)
                                    <option value="{{ $userType->id }}">{{ $userType->type_name }}</option>
                                @endforeach
                        </x-form.select>

                        <x-form.error :messages="$errors->get('user_type')" />
                    </div>

                </div>
                <div class="grid gap-6 w-full md:w-1/2">
                    <!-- Institution -->
                    <div class="space-y-2">
                        <x-form.label for="institution" :value="__('Institution')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                {{-- <x-heroicon-o-building aria-hidden="true" class="w-5 h-5" /> --}}
                            </x-slot>

                            <x-form.input withicon id="institution" class="block w-full" type="text"
                                name="institution" :value="old('institution')" placeholder="{{ __('Institution') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Front Degree -->
                    <div class="space-y-2">
                        <x-form.label for="front_degree" :value="__('Front Degree')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-academic-cap aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="front_degree" class="block w-full" type="text"
                                name="front_degree" :value="old('front_degree')" placeholder="{{ __('Front Degree') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Back Degree -->
                    <div class="space-y-2">
                        <x-form.label for="back_degree" :value="__('Back Degree')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-academic-cap aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="back_degree" class="block w-full" type="text"
                                name="back_degree" :value="old('back_degree')" placeholder="{{ __('Back Degree') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <x-form.label for="password" :value="__('Password')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="password" class="block w-full" type="password" name="password"
                                required autocomplete="new-password" placeholder="{{ __('Password') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-2">
                        <x-form.label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="password_confirmation" class="block w-full" type="password"
                                name="password_confirmation" required placeholder="{{ __('Confirm Password') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <div class="space-y-2"></div>
                </div>
            </div>
            <!-- Register Button -->
            <div class="w-full flex flex-col items-center">
                <x-button class="justify-center w-full md:w-1/4 gap-2 mt-6">
                    <x-heroicon-o-user-add class="w-6 h-6" aria-hidden="true" />
                    <span>{{ __('Register') }}</span>
                </x-button>

                <!-- Already Registered Link -->
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                    {{ __('Already registered?') }}
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">
                        {{ __('Login') }}
                    </a>
                </p>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
