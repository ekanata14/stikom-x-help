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
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-blue-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Invoice ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Payment Method
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Payment Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($purchases as $purchase)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loop->iteration + ($purchases->currentPage() - 1) * $purchases->perPage() }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $purchase->invoice_id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $purchase->user->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ 'IDR ' . number_format($purchase->total_price, 0, ',', '.') }}
                                        </td>
                                        <td
                                            class="px-6 py-4 font-bold @if ($purchase->status == 'paid') text-green-500 
                                            @elseif ($purchase->status == 'cancelled') text-red-500
                                        @else
                                            text-yellow-500 @endif">
                                            {{ ucfirst($purchase->status) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $purchase->payment_method }}
                                        </td>
                                        <td
                                            class="px-6 py-4 font-bold @if ($purchase->payment_status == 'success') text-green-500 
                                            @elseif ($purchase->payment_status == 'failed') text-red-500                                            
                                      @else
                                           text-yellow-500 @endif">
                                            {{ ucfirst($purchase->payment_status) }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-4">
                                            {{-- @if ($purchase->status == 'paid')
                                                <form action="{{ route('purchase.unverify') }}" method="POST"
                                                    onsubmit="return confirm('{{ __('Are you sure you want to unverify this purchase?') }}');">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $purchase->id }}">
                                                    <x-button variant="danger">
                                                        <x-heroicon-o-x class="w-5 h-5" aria-hidden="true" />
                                                        {{ __('Unverify') }}
                                                    </x-button>
                                                </form>
                                            @else
                                                @if ($purchase->status == 'cancelled')
                                                    <form action="{{ route('purchase.uncancel') }}" method="POST"
                                                        onsubmit="return confirm('{{ __('Are you sure you want to uncancel this purchase?') }}');">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $purchase->id }}">
                                                        <x-button variant="danger">
                                                            <x-heroicon-o-x class="w-5 h-5" aria-hidden="true" />
                                                            {{ __('Uncancel') }}
                                                        </x-button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('purchase.verify') }}" method="POST"
                                                        onsubmit="return confirm('{{ __('Are you sure you want to verify this purchase?') }}');">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $purchase->id }}">
                                                        <x-button variant="info">
                                                            <x-heroicon-o-check class="w-5 h-5" aria-hidden="true" />
                                                            {{ __('Verify') }}
                                                        </x-button>
                                                    </form>
                                                    <form action="{{ route('purchase.cancel') }}" method="POST"
                                                        onsubmit="return confirm('{{ __('Are you sure you want to cancel this purchase?') }}');">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $purchase->id }}">
                                                        <x-button variant="danger">
                                                            <x-heroicon-o-x class="w-5 h-5" aria-hidden="true" />
                                                            {{ __('Cancel') }}
                                                        </x-button>
                                                    </form>
                                                @endif
                                            @endif --}}
                                            <!-- Modal toggle -->
                                            <button data-modal-target="receipt-modal->{{ $purchase->id }}"
                                                data-modal-toggle="receipt-modal->{{ $purchase->id }}"
                                                class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-blue-800"
                                                type="button">
                                                Receipt & Verify
                                            </button>

                                            <!-- Main modal -->
                                            <div id="receipt-modal->{{ $purchase->id }}" tabindex="-1"
                                                aria-hidden="true"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div
                                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                            <h3
                                                                class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                Payment Receipt
                                                            </h3>
                                                            <button type="button"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="receipt-modal->{{ $purchase->id }}">
                                                                <svg class="w-3 h-3" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="p-4 md:p-5 space-y-4 flex justify-center">
                                                            <img src="{{ route('purchase.receipt.admin', ['id' => $purchase->id]) }}"
                                                                alt="Receipt Image" class="h-[500px]">
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div
                                                            class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 gap-2">
                                                            @if ($purchase->status == 'paid')
                                                                <form action="{{ route('purchase.unverify') }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('{{ __('Are you sure you want to unverify this purchase?') }}');">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $purchase->id }}">
                                                                    <x-button variant="danger">
                                                                        <x-heroicon-o-x class="w-5 h-5"
                                                                            aria-hidden="true" />
                                                                        {{ __('Unverify') }}
                                                                    </x-button>
                                                                </form>
                                                            @else
                                                                @if ($purchase->status == 'cancelled')
                                                                    <form action="{{ route('purchase.uncancel') }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('{{ __('Are you sure you want to uncancel this purchase?') }}');">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $purchase->id }}">
                                                                        <x-button variant="danger">
                                                                            <x-heroicon-o-x class="w-5 h-5"
                                                                                aria-hidden="true" />
                                                                            {{ __('Uncancel') }}
                                                                        </x-button>
                                                                    </form>
                                                                @else
                                                                    <form action="{{ route('purchase.verify') }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('{{ __('Are you sure you want to verify this purchase?') }}');">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $purchase->id }}">
                                                                        <x-button variant="info">
                                                                            <x-heroicon-o-check class="w-5 h-5"
                                                                                aria-hidden="true" />
                                                                            {{ __('Verify') }}
                                                                        </x-button>
                                                                    </form>
                                                                    <form action="{{ route('purchase.cancel') }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('{{ __('Are you sure you want to cancel this purchase?') }}');">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $purchase->id }}">
                                                                        <x-button variant="danger">
                                                                            <x-heroicon-o-x class="w-5 h-5"
                                                                                aria-hidden="true" />
                                                                            {{ __('Cancel') }}
                                                                        </x-button>
                                                                    </form>
                                                                @endif
                                                            @endif
                                                            <button
                                                                data-modal-hide="receipt-modal->{{ $purchase->id }}"
                                                                type="button"
                                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <x-button href="{{ route('purchase.edit', $purchase->id) }}"
                                                variant="warning" class="justify-center max-w-xs gap-2">
                                                <span>Edit</span>
                                            </x-button>
                                            <form action="{{ route('purchase.destroy', $purchase->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('{{ __('Are you sure you want to delete this purchase?') }}');">
                                                @csrf
                                                @method('DELETE')

                                                <x-button variant="danger">
                                                    <x-heroicon-o-trash class="w-5 h-5" aria-hidden="true" />
                                                    {{ __('Delete') }}
                                                </x-button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="px-6 py-4 text-center text-gray-500">No purchases
                                            found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $purchases->links() }} <!-- Menampilkan link pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
