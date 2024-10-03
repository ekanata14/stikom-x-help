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
        class="mt-8 p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 flex flex-col md:flex-row gap-8">
        {{-- card-start --}}
        @forelse ($purchases as $purchase)
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
                    @if ($purchase->status == 'pending')
                        @if ($purchase->payment_status == 'pending')
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Payment Status: <span
                                    class="text-red-500">UNPAID</span></p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Status: <span
                                    class="text-red-500">NOT CONFIRMED</span></p>
                        @elseif($purchase->payment_status == 'success')
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Payment Status: <span
                                    class="text-green-500">SUCCESS</span></p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Status: <span
                                    class="text-yellow-500">WAITING FOR CONFIRMATION</span></p>
                        @endif
                    @elseif($purchase->status == 'paid')
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Status: <span
                                class="text-green-500">CONFIRMED</span></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Payment Status: <span
                                class="text-green-500">SUCCESS</span></p>
                    @elseif($purchase->status == 'cancelled')
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Status: <span
                                class="text-red-500">CANCELLED</span></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Payment Status: <span
                                class="text-red-500">FAILED</span></p>
                    @endif
                    @if ($purchase->payment_receipt != null)
                        <!-- Modal toggle -->
                        <button data-modal-target="detail-modal-{{ $purchase->id }}"
                            data-modal-toggle="detail-modal-{{ $purchase->id }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Detail
                        </button>

                        <!-- Main modal -->
                        <div id="detail-modal-{{ $purchase->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Items Detail
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="detail-modal-{{ $purchase->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-blue-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">
                                                            No
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Name
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Price
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($purchase->cart->cartItems as $item)
                                                        <tr
                                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                {{ $loop->iteration }}
                                                            </th>
                                                            <td class="px-6 py-4">
                                                                {{ $item->product->name }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $item->product->currency }}
                                                                {{ number_format($item->product->price, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6"
                                                                class="px-6 py-4 text-center text-gray-500">No items
                                                                found.
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="detail-modal-{{ $purchase->id }}" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal toggle -->
                        <button data-modal-target="receipt-modal->{{ $purchase->id }}"
                            data-modal-toggle="receipt-modal->{{ $purchase->id }}"
                            class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-blue-800"
                            type="button">
                            Payment Receipt
                        </button>

                        <!-- Main modal -->
                        <div id="receipt-modal->{{ $purchase->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Terms of Service
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="receipt-modal->{{ $purchase->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <img src="{{ route('purchase.receipt.user', ['id' => $purchase->id]) }}"
                                            alt="Receipt Image">
                                    </div>
                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="receipt-modal->{{ $purchase->id }}" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
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
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Detail
                            </button>
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
                    @endif
                </div>
            </div>
        @empty
        @endforelse
        {{-- card-end --}}
    </div>

</x-app-layout>
