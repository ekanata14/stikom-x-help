<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            <div class="flex flex-col md:flex-row w-full gap-8">
                @csrf

                <div class="grid gap-6 w-full md:w-1/2">

                    <!-- First Name -->
                    <div class="space-y-2">
                        <div class="flex gap-1">
                            <x-form.label for="first_name" :value="__('First Name')" />
                            <span class="text-red-500">*</span>
                        </div>

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="first_name" class="block w-full" type="text" name="first_name"
                                :value="old('first_name')" required autofocus placeholder="{{ __('First Name') }}" required/>
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Last Name -->
                    <div class="space-y-2">
                        <div class="flex gap-1">
                            <x-form.label for="last_name" :value="__('Last Name')" />
                            <span class="text-red-500">*</span>
                        </div>

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="last_name" class="block w-full" type="text" name="last_name"
                                :value="old('last_name')" required placeholder="{{ __('Last Name') }}" required/>
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Complete Name -->
                    <div class="space-y-2">
                        <div class="flex gap-1">
                            <x-form.label for="complete_name" :value="__('Complete Name (e.g: Dr. John Doe, S.Kom., M.M. / PhD)')" />
                            <span class="text-red-500">*</span>
                        </div>

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
                        <div class="flex gap-1">
                            <x-form.label for="email" :value="__('Email')" />
                            <span class="text-red-500">*</span>
                        </div>

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="email" class="block w-full" type="email" name="email"
                                :value="old('email')" required placeholder="{{ __('Email') }}" required/>
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Mobile Phone -->
                    <div class="space-y-2">
                        <div class="flex gap-1">
                            <x-form.label for="mobile_phone" :value="__('Mobile Phone (+62/Country Code)')" />
                            <span class="text-red-500">*</span>
                        </div>

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-phone aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="mobile_phone" class="block w-full" type="text"
                                name="mobile_phone" :value="old('mobile_phone')" required
                                placeholder="{{ __('+62888888111') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    {{-- User Type --}}
                    <div class="space-y-2">
                        <div class="flex gap-1">
                            <x-form.label for="user_type" :value="__('Participant Type')" />
                            <span class="text-red-500">*</span>
                        </div>

                        <x-form.select :id="__('user_type')" :name="__('id_user_type')" required>
                            <option value="">{{ __('Participant Type') }}</option>
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
                        <div class="flex gap-1">
                            <x-form.label for="institution" :value="__('Institution')" />
                            <span class="text-red-500">*</span>
                        </div>

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-academic-cap aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="institution" class="block w-full" type="text"
                                name="institution" :value="old('institution')" placeholder="{{ __('Institution') }}" required/>
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Occupation -->
                    <div class="space-y-2">
                        <div class="flex gap-1">
                            <x-form.label for="occupation" :value="__('Occupation')" />
                            <span class="text-red-500">*</span>
                        </div>

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-academic-cap aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="occupation" class="block w-full" type="text" name="occupation"
                                :value="old('occupation')" placeholder="{{ __('Occupation') }}" required/>
                        </x-form.input-with-icon-wrapper>
                    </div>

                    {{-- Student Card --}}
                    <div class="space-y-2">
                        <div class="flex gap-1">
                            <label class="block text-sm font-medium text-gray-900 dark:text-white"
                                for="small_size">Student
                                Card</label>
                        </div>
                        <x-form.error :messages="$errors->get('identity_card')" />
                        <input
                            class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="identity_card" type="file" name="identity_card">
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <div class="flex gap-1">
                            <x-form.label for="password" :value="__('Password')" />
                            <span class="text-red-500">*</span>
                        </div>

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="password" class="block w-full" type="password"
                                name="password" required autocomplete="new-password"
                                placeholder="{{ __('Password') }}" required/>
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-2">
                        <div class="flex gap-1">
                            <x-form.label for="password_confirmation" :value="__('Confirm Password')" />
                            <span class="text-red-500">*</span>
                        </div>

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="password_confirmation" class="block w-full" type="password"
                                name="password_confirmation" required placeholder="{{ __('Confirm Password') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <div class="space-y-2"></div>
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
