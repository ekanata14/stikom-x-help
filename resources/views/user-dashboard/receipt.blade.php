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
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $purchase->invoice_id }}</h5>
                    </a>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $purchase->cart->cartItems[0]->product->name }}</h5>
                    @if ($purchase->currency == 'USD')
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            ${{ number_format($purchase->total_price, 2) }}</p>
                    @else
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">IDR
                            {{ number_format($purchase->total_price, 0, ',', '.') }}</p>
                    @endif
                    <form action="{{ route('user.purchase.upload.receipt.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="id" value="{{ $purchase->id }}">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="small_size">Upload Your Payment Receipt</label>
                        <x-form.error :messages="$errors->get('payment_receipt')" />
                        <input
                            class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="payment_receipt" type="file" name="payment_receipt">

                        <button type="submit"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Upload
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            {{-- card-end --}}
        </div>
    </x-auth-card>
</x-guest-layout>
