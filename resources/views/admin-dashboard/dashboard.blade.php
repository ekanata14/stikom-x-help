<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
            {{-- <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button> --}}
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        {{ __('Welcome, ') }}{{ auth()->user()->complete_name }}
    </div>
    <div class="grid grid-cols-4 px-20 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-8">
        {{-- card-start --}}
        <div
            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center">
            <div class="p-5">
                Total Users: {{ $totalUsers }}
            </div>
        </div>
        {{-- card-end --}}
        {{-- card-start --}}
        <div
            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center">
            <div class="p-5">
                Total Purchase: {{ $totalPurchases }}
            </div>
        </div>
        {{-- card-end --}}
        {{-- card-start --}}
        <div
            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center">
            <div class="p-5">
                Total Income IDR:
                {{ number_format($totalIncomeIDR, 0, ',', '.') }}
            </div>
        </div>
        {{-- card-end --}}
        {{-- card-start --}}
        <div
            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center">
            <div class="p-5">
                Total Income USD:
                {{ number_format($totalIncomeUSD, 0, ',', '.') }}
            </div>
        </div>
        {{-- card-end --}}
    </div>
</x-app-layout>
