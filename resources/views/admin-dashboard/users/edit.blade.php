<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-0">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col md:flex-row w-full gap-8">
                            <div class="grid gap-6 w-full md:w-1/2">

                                <!-- First Name -->
                                <div class="space-y-2">
                                    <x-form.label for="first_name" :value="__('First Name')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>
                                        <x-form.input withicon id="first_name" class="block w-full" type="text"
                                            name="first_name" :value="old('first_name', $user->first_name)" required autofocus
                                            placeholder="{{ __('First Name') }}" />
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('first_name')" />
                                </div>

                                <!-- Last Name -->
                                <div class="space-y-2">
                                    <x-form.label for="last_name" :value="__('Last Name')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>
                                        <x-form.input withicon id="last_name" class="block w-full" type="text"
                                            name="last_name" :value="old('last_name', $user->last_name)" required
                                            placeholder="{{ __('Last Name') }}" />
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('last_name')" />
                                </div>

                                <!-- Complete Name -->
                                <div class="space-y-2">
                                    <x-form.label for="complete_name" :value="__('Complete Name')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>
                                        <x-form.input withicon id="complete_name" class="block w-full" type="text"
                                            name="complete_name" :value="old('complete_name', $user->complete_name)" required
                                            placeholder="{{ __('Complete Name') }}" />
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('complete_name')" />
                                </div>

                                <!-- Email Address -->
                                <div class="space-y-2">
                                    <x-form.label for="email" :value="__('Email')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>
                                        <x-form.input withicon id="email" class="block w-full" type="email"
                                            name="email" :value="old('email', $user->email)" required
                                            placeholder="{{ __('Email') }}" />
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('email')" />
                                </div>

                                <!-- Mobile Phone -->
                                <div class="space-y-2">
                                    <x-form.label for="mobile_phone" :value="__('Mobile Phone')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-phone aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>
                                        <x-form.input withicon id="mobile_phone" class="block w-full" type="text"
                                            name="mobile_phone" :value="old('mobile_phone', $user->mobile_phone)" required
                                            placeholder="{{ __('Mobile Phone') }}" />
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('mobile_phone')" />
                                </div>

                                {{-- User Type --}}
                                <div class="space-y-2">
                                    <x-form.label for="user_type" :value="__('Position')" />
                                    <x-form.select :id="__('id_user_type')" :name="__('id_user_type')" required>
                                        <option value="">{{ __('Position') }}</option>
                                        @foreach ($userTypes as $userType)
                                            <option value="{{ $userType->id }}"
                                                {{ $user->id_user_type == $userType->id ? 'selected' : '' }}>
                                                {{ $userType->type_name }}
                                            </option>
                                        @endforeach
                                    </x-form.select>
                                    <x-form.error :messages="$errors->get('id_user_type')" />
                                </div>

                            </div>

                            <div class="grid gap-6 w-full md:w-1/2">

                                <!-- Institution -->
                                <div class="space-y-2">
                                    <x-form.label for="institution" :value="__('Institution')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            {{-- Optional icon for institution --}}
                                        </x-slot>
                                        <x-form.input withicon id="institution" class="block w-full" type="text"
                                            name="institution" :value="old('institution', $user->institution)"
                                            placeholder="{{ __('Institution') }}" />
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('institution')" />
                                </div>

                                <!-- Front Degree -->
                                <div class="space-y-2">
                                    <x-form.label for="front_degree" :value="__('Front Degree')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-academic-cap aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>
                                        <x-form.input withicon id="front_degree" class="block w-full" type="text"
                                            name="front_degree" :value="old('front_degree', $user->front_degree)"
                                            placeholder="{{ __('Front Degree') }}" />
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('front_degree')" />
                                </div>

                                <!-- Back Degree -->
                                <div class="space-y-2">
                                    <x-form.label for="back_degree" :value="__('Back Degree')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-academic-cap aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>
                                        <x-form.input withicon id="back_degree" class="block w-full" type="text"
                                            name="back_degree" :value="old('back_degree', $user->back_degree)"
                                            placeholder="{{ __('Back Degree') }}" />
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('back_degree')" />
                                </div>

                                <!-- Password -->
                                <div class="space-y-2">
                                    <x-form.label for="password" :value="__('Password')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>
                                        <x-form.input withicon id="password" class="block w-full" type="password"
                                            name="password" autocomplete="new-password"
                                            placeholder="{{ __('Leave blank to keep current password') }}" />
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('password')" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="space-y-2">
                                    <x-form.label for="password_confirmation" :value="__('Confirm Password')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>
                                        <x-form.input withicon id="password_confirmation" class="block w-full"
                                            type="password" name="password_confirmation"
                                            placeholder="{{ __('Confirm Password') }}" />
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('password_confirmation')" />
                                </div>
                            </div>
                        </div>

                        <!-- Update Button -->
                        <div class="w-full flex flex-col items-start">
                            <x-button class="justify-center w-full md:w-1/4 gap-2 mt-6">
                                <x-heroicon-o-user-add class="w-6 h-6" aria-hidden="true" />
                                <span>{{ __('Update User') }}</span>
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
