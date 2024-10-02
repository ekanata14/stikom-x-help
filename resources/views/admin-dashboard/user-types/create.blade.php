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
                    <form method="POST" action="{{ route('user-types.store') }}">
                        @csrf
                        <div class="flex flex-col md:flex-row w-full gap-8">
                            <div class="grid gap-6 w-full md:w-1/2">
                                <!-- First Name -->
                                <div class="space-y-2">
                                    <x-form.label for="first_name" :value="__('Name')" />
                                    <x-form.input-with-icon-wrapper>
                                        <x-slot name="icon">
                                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                                        </x-slot>
                                        <x-form.input withicon id="type_name" class="block w-full" type="text"
                                            name="type_name" :value="old('type_name')" required autofocus
                                            placeholder="{{ __('Name') }}" />
                                    </x-form.input-with-icon-wrapper>
                                    <x-form.error :messages="$errors->get('type_name')" />
                                </div>
                            </div>
                        </div>

                        <!-- Register Button -->
                        <div class="w-full flex flex-col items-start">
                            <x-button class="justify-center w-full md:w-1/4 gap-2 mt-6">
                                <x-heroicon-o-user-add class="w-6 h-6" aria-hidden="true" />
                                <span>{{ __('Add') }}</span>
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
