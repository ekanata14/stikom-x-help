<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-0">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('products.store') }}">
                        @csrf
                        <div class="flex flex-col md:flex-row w-full gap-8">
                            <div class="grid gap-6 w-full md:w-1/2">

                                <!-- User Type -->
                                <div class="space-y-2">
                                    <x-form.label for="user_type_id" :value="__('User Type')" />
                                    <x-form.select :id="__('user_type_id')" :name="__('user_type_id')">
                                        <option value="">{{ __('User Type') }}</option>
                                        @foreach ($userTypes as $userType)
                                            <option value="{{ $userType->id }}">{{ $userType->type_name }}</option>
                                        @endforeach
                                    </x-form.select>
                                    <x-form.error :messages="$errors->get('user_type_id')" />
                                </div>

                                <!-- Name -->
                                <div class="space-y-2">
                                    <x-form.label for="name" :value="__('Name')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-document aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>
                                        <x-form.input withicon id="name" class="block w-full" type="text"
                                            name="name" :value="old('name')" required autofocus
                                            placeholder="{{ __('Name') }}" />
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('name')" />
                                </div>

                                <!-- Description -->
                                <div class="space-y-2">
                                    <x-form.label for="description" :value="__('Description')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-pencil-alt aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>
                                        <textarea name="description" id="description" rows="4" class="block w-full" placeholder="{{ __('Description') }}">{{ old('description') }}</textarea>
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('description')" />
                                </div>

                                <!-- Currency -->
                                <div class="space-y-2">
                                    <x-form.label for="currency" :value="__('Currency')" />
                                    <x-form.select :id="__('currency')" :name="__('currency')">
                                        <option value="">{{ __('Currency') }}</option>
                                        <option value="IDR">IDR</option>
                                        <option value="USD">USD</option>
                                    </x-form.select>
                                    <x-form.error :messages="$errors->get('currency')" />
                                </div>

                                <!-- Price -->
                                <div class="space-y-2">
                                    <x-form.label for="price" :value="__('Price')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-currency-dollar aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>
                                        <x-form.input withicon id="price" class="block w-full" type="number"
                                            step="0.01" name="price" :value="old('price')" required
                                            placeholder="{{ __('Price') }}" />
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('price')" />
                                </div>

                                <!-- Quota -->
                                <div class="space-y-2">
                                    <x-form.label for="quota" :value="__('Quota')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-archive aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>
                                        <x-form.input withicon id="quota" class="block w-full" type="number"
                                            name="quota" :value="old('quota')" required
                                            placeholder="{{ __('Quota') }}" />
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('quota')" />
                                </div>
                            </div>
                        </div>

                        <!-- Register Button -->
                        <div class="w-full flex flex-col items-start">
                            <x-button class="justify-center w-full md:w-1/4 gap-2 mt-6">
                                <x-heroicon-o-save class="w-6 h-6" aria-hidden="true" />
                                <span>{{ __('Add Product') }}</span>
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
