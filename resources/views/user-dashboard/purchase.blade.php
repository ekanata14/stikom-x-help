<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="flex flex-col justify-center gap-4">
            <h1 class="text-center">Purchasement Page</h1>
            {{-- card-start --}}
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center">
                <a href="#">
                    <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                </a>
                @if ($product != null)
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $product->name }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
                        @if ($product->currency == 'USD')
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                ${{ number_format($product->price, 2) }}</p>
                        @else
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">IDR
                                {{ number_format($product->price, 0, ',', '.') }}</p>
                        @endif
                        <form action="{{ route('user.purchase.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="currency" value="{{ $product->currency }}">
                            <input type="hidden" name="status" value="pending">
                            <input type="hidden" name="total_price" value="{{ $product->price }}">
                            <input type="hidden" name="payment_method" value="Bank Transfer">
                            <input type="hidden" name="payment_status" value="pending">
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                onclick="this.disabled=true; this.form.submit();">
                                Purchase
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @else
                    <h5 class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">
                        No Products</h5>
                @endif
            </div>
            {{-- card-end --}}
        </div>
    </x-auth-card>
</x-guest-layout>
