<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 w-full">
        <div class="flex flex-col md:flex-row w-full gap-6">
            @csrf
            @method('patch')

            <div class="w-full md:w-1/2 flex flex-col gap-4">
                <!-- First Name -->
                <div class="space-y-2">
                    <x-form.label for="first_name" :value="__('First Name')" />

                    <x-form.input id="first_name" name="first_name" type="text" class="block w-full"
                        :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />

                    <x-form.error :messages="$errors->get('first_name')" />
                </div>

                <!-- Last Name -->
                <div class="space-y-2">
                    <x-form.label for="last_name" :value="__('Last Name')" />

                    <x-form.input id="last_name" name="last_name" type="text" class="block w-full" :value="old('last_name', $user->last_name)"
                        required autocomplete="last_name" />

                    <x-form.error :messages="$errors->get('last_name')" />
                </div>

                <!-- Complete Name -->
                <div class="space-y-2">
                    <x-form.label for="complete_name" :value="__('Complete Name')" />

                    <x-form.input id="complete_name" name="complete_name" type="text" class="block w-full"
                        :value="old('complete_name', $user->complete_name)" required autocomplete="complete_name" />

                    <x-form.error :messages="$errors->get('complete_name')" />
                </div>

                <!-- Email Address -->
                <div class="space-y-2">
                    <x-form.label for="email" :value="__('Email')" />

                    <x-form.input id="email" name="email" type="email" class="block w-full" :value="old('email', $user->email)"
                        required autocomplete="email" />

                    <x-form.error :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-300">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:text-gray-400 dark:hover:text-gray-200 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Mobile Phone -->
                <div class="space-y-2">
                    <x-form.label for="mobile_phone" :value="__('Mobile Phone')" />

                    <x-form.input id="mobile_phone" name="mobile_phone" type="text" class="block w-full"
                        :value="old('mobile_phone', $user->mobile_phone)" required autocomplete="mobile_phone" />

                    <x-form.error :messages="$errors->get('mobile_phone')" />
                </div>
            </div>
            <div class="w-full md:w-1/2 flex flex-col gap-4">
                <!-- Institution -->
                <div class="space-y-2">
                    <x-form.label for="institution" :value="__('Institution')" />

                    <x-form.input id="institution" name="institution" type="text" class="block w-full"
                        :value="old('institution', $user->institution)" autocomplete="institution" />

                    <x-form.error :messages="$errors->get('institution')" />
                </div>

                <!-- Front Degree -->
                <div class="space-y-2">
                    <x-form.label for="front_degree" :value="__('Front Degree')" />

                    <x-form.input id="front_degree" name="front_degree" type="text" class="block w-full"
                        :value="old('front_degree', $user->front_degree)" autocomplete="front_degree" />

                    <x-form.error :messages="$errors->get('front_degree')" />
                </div>

                <!-- Back Degree -->
                <div class="space-y-2">
                    <x-form.label for="back_degree" :value="__('Back Degree')" />

                    <x-form.input id="back_degree" name="back_degree" type="text" class="block w-full"
                        :value="old('back_degree', $user->back_degree)" autocomplete="back_degree" />

                    <x-form.error :messages="$errors->get('back_degree')" />
                </div>

                <!-- User Type -->
                <div class="space-y-2">
                    <x-form.label for="id_user_type" :value="__('User Type')" />

                    <x-form.select id="id_user_type" name="id_user_type" class="block w-full" :value="old('id_user_type', $user->id_user_type)"
                        required>
                        @foreach ($userTypes as $type)
                            <option value="{{ $type->id }}"
                                {{ old('id_user_type', $user->id_user_type) == $type->id ? 'selected' : '' }}>
                                {{ $type->type_name }}
                            </option>
                        @endforeach
                    </x-form.select>

                    <x-form.error :messages="$errors->get('id_user_type')" />
                </div>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <x-button>
                {{ __('Save') }}
            </x-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
