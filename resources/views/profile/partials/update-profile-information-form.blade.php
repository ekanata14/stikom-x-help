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

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 w-full" enctype="multipart/form-data">
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

                <!-- Occupation -->
                <div class="space-y-2">
                    <x-form.label for="occupation" :value="__('Occupation')" />

                    <x-form.input id="occcupation" name="occupation" type="text" class="block w-full"
                        :value="old('occupation', $user->occupation)" autocomplete="occupation" />

                    <x-form.error :messages="$errors->get('front_degree')" />
                </div>

                <!-- Occupation -->
                <div class="space-y-2">
                    <x-form.label for="identity id" :value="__('Identity Id (NIM)')" />

                    <x-form.input id="identityId" name="identity_id" type="text" class="block w-full"
                        :value="old('identity_id', $user->identity_id)" autocomplete="identity_id" />

                    <x-form.error :messages="$errors->get('front_degree')" />
                </div>

                <!-- Student Card -->
                <div class="space-y-2">
                    <x-form.label for="identity_card" :value="__('Identity Card')" />

                    {{-- <input id="identity_card" name="identity_card" type="file"
                        class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        :value="old('identity_card', $user->identity_card)" autocomplete="identity_card" /> --}}
                        <input
                            class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="identity_card" type="file" name="identity_card">

                    <x-form.error :messages="$errors->get('identity_card')" />
                    <!-- Modal toggle -->
                    <button data-modal-target="student-card" data-modal-toggle="student-card"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-blue-800"
                        type="button">
                        Student Card
                    </button>

                    <!-- Main modal -->
                    <div id="student-card" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Student Card
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="student-card">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 space-y-4">
                                    <img src="{{ route('user.student.card', ['id' => $user->id]) }}"
                                        alt="Student Card Image">
                                </div>
                                <!-- Modal footer -->
                                <div
                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button data-modal-hide="student-card" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
