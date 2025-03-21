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
    <div
        class="grid grid-cols-1 md:grid-cols-2 px-20 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mt-8">
        <div>
            {{-- card-start --}}
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center">
                <div class="p-5">
                    Total Users: {{ $totalUsers }}
                    {{-- <a href="{{ route('users.complete.profile.email') }}"> --}}
                    {{-- <x-button class="justify-center w-full gap-2 mt-6">
                            <span>{{ __('Complete Profile Email') }}</span>
                        </x-button> --}}
                    {{-- </a> --}}
                    <a href="{{ route('mail.qr-code') }}">
                        <x-button class="justify-center w-full gap-2 mt-6">
                            <span>{{ __('QR Code Email') }}</span>
                        </x-button>
                    </a>
                    @php
                        $user_id = auth()->user()->id;
                    @endphp
                    {{-- <canvas id="canvas"></canvas> --}}
                    <canvas id="canvas"></canvas>
                    <script>
                        // Pastikan elemen canvas tersedia
                        var canvas = document.getElementById('canvas');
                        if (canvas) {
                            // Generate QR Code dengan data string
                            QRCode.toCanvas(canvas, $user_id, function(error) {
                                if (error) {
                                    console.error('Error generating QR Code:', error);
                                } else {
                                    console.log('QR Code generated successfully!');
                                }
                            });
                        } else {
                            console.error('Canvas element not found!');
                        }
                    </script>
                </div>
            </div>
            {{-- card-end --}}
            {{-- card-start --}}
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center">
                <div class="p-5">
                    Total Purchase: {{ $totalPurchases }}
                    <br>
                    Total Verified Purchase: {{ $totalVerifiedPurchases }}
                </div>
            </div>
            {{-- card-end --}}
            {{-- card-start --}}
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center">
                <div class="p-5">
                    Total Income IDR:
                    {{ number_format($totalIncomeIDR, 0, ',', '.') }}
                    <br>
                    Verified Income IDR:
                    {{ number_format($totalVerifiedIncomeIDR, 0, ',', '.') }}
                </div>
            </div>
            {{-- card-end --}}
            {{-- card-start --}}
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center">
                <div class="p-5">
                    Total Income USD:
                    {{ number_format($totalIncomeUSD, 0, ',', '.') }}
                    <br>
                    Verified Income USD:
                    {{ number_format($totalVerifiedIncomeUSD, 0, ',', '.') }}
                </div>
            </div>
        </div>
        <div>
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center">
                <table>
                    <thead>
                        <tr>
                            <th>User Type</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($totalUserBasedOnType as $userType)
                            <tr>
                                <td>{{ $userType->type_name }}</td>
                                <td>{{ $userType->total_user }}</td>
                                <td>
                                    <a href="{{ route('user-types.detail', $userType->id) }}">
                                        <x-button variant="info">
                                            {{ __('Detail') }}
                                        </x-button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
