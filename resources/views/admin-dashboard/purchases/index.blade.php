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
                                            {{ $loop->iteration }}
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
                                        <td class="px-6 py-4">
                                            {{ ucfirst($purchase->status) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $purchase->payment_method }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ ucfirst($purchase->payment_status) }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-4">
                                            <x-button href="{{ route('purchase.edit', $purchase->id) }}"
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
                                            </form>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
