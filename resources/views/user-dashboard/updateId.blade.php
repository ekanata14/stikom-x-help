<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="flex flex-col justify-center gap-4">
            <h1 class="text-center">Complete Your Identity</h1>
            {{-- card-start --}}
            <div
                class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center justify-center text-center py-4">
                <form action="{{ route('users.update.identity-id.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                    <!-- Password -->
                    <div class="space-y-2 mb-4">
                        <div class="flex gap-1">
                            <x-form.label for="NIM" :value="__('NIM')" />
                            <span class="text-red-500">*</span>
                        </div>

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                            </x-slot>

                            <x-form.input withicon id="number" class="block w-full" type="text" name="identity_id"
                                required autocomplete="nim" placeholder="{{ __('Your NIM') }}" required />
                        </x-form.input-with-icon-wrapper>
                    </div>
                    {{-- @if (auth()->user()->identity_card == null) --}}
                        {{-- Student Card --}}
                        {{-- <div class="space-y-2">
                            <div class="flex gap-1">
                                <label class="block text-sm font-medium text-gray-900 dark:text-white"
                                    for="small_size">And upload Your Student Card (KTM)</label>
                            </div>
                            <x-form.error :messages="$errors->get('identity_card')" />
                            <input
                                class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="identity_card" type="file" name="identity_card">
                        </div>
                    @endif --}}
                    <x-button class="justify-center w-full gap-2 mt-6">
                        <span>{{ __('Submit') }}</span>
                    </x-button>
                </form>
            </div>
            {{-- card-end --}}
        </div>
    </x-auth-card>
</x-guest-layout>
