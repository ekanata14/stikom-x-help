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
                    <x-button href="{{ route('purchase.export.pending') }}" variant="success" class="justify-center max-w-xs gap-2">
                        <span>Export Pending Purchases</span>
                    </x-button>
                    <x-button href="{{ route('purchase.export.paid') }}" variant="success" class="justify-center max-w-xs gap-2">
                        <span>Export Paid Purchases</span>
                    </x-button>
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
                                        Admin Verification
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Payment Method
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Payment Receipt
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
                                            @php
                                                $currency = null;
                                                if($purchase->currency == "USD"){
                                                    $currency = "USD";
                                                } else {
                                                    $currency = "IDR";
                                                }
                                            @endphp
                                            {{ $currency.' ' . number_format($purchase->total_price, 0, ',', '.') }}
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
                                            @if ($purchase->status == 'pending')
                                                <form action="{{ route('purchase.email-notify') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $purchase->id }}">
                                                    <x-button variant="info">
                                                        <x-heroicon-o-mail class="w-5 h-5" aria-hidden="true" />
                                                        {{ __('Notify') }}
                                                    </x-button>
                                                </form>
                                            @endif

                                            <!-- Modal toggle -->
                                            <button data-modal-target="receipt-modal-{{ $purchase->id }}"
                                                data-modal-toggle="receipt-modal-{{ $purchase->id }}"
                                                class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-blue-800"
                                                type="button">
                                                Receipt & Verify
                                            </button>

                                            <!-- Main modal -->
                                            <div id="receipt-modal-{{ $purchase->id }}" tabindex="-1"
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
                                                                data-modal-hide="receipt-modal-{{ $purchase->id }}">
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
                                                            @if (route('purchase.receipt.admin', ['id', $purchase->id]) == 0)
                                                                <h3>There are no receipt</h3>
                                                            @else
                                                                <img src="{{ route('purchase.receipt.admin', ['id' => $purchase->id]) }}"
                                                                    alt="Receipt Image" class="h-[500px]"
                                                                    onerror="handleImageError(this)">
                                                                <script>
                                                                    function handleImageError(image) {
                                                                        // Change the image to a placeholder or handle the error visually
                                                                        image.alt = "Receipt Image Not uploaded yet";
                                                                    }
                                                                </script>
                                                            @endif
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
                                                                data-modal-hide="receipt-modal-{{ $purchase->id }}"
                                                                type="button"
                                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- User Detail --}}
                                            <button data-modal-target="user-detail-modal-{{ $purchase->id }}"
                                                data-modal-toggle="user-detail-modal-{{ $purchase->id }}"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button">
                                                User Detail
                                            </button>

                                            <!-- Main modal -->
                                            <div id="user-detail-modal-{{ $purchase->id }}" tabindex="-1"
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
                                                                User Detail
                                                            </h3>
                                                            <button type="button"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="user-detail-modal-{{ $purchase->id }}">
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
                                                            <div class="flex flex-col md:flex-row w-full gap-8">
                                                                <div class="grid gap-6 w-full md:w-1/2">

                                                                    <!-- First Name -->
                                                                    <div class="space-y-2">
                                                                        <x-form.label for="first_name"
                                                                            :value="__('First Name')" />
                                                                        <x-form.input-with-icon-wrapper>
                                                                            <x-slot name="icon">
                                                                                <x-heroicon-o-user aria-hidden="true"
                                                                                    class="w-5 h-5" />
                                                                            </x-slot>
                                                                            <x-form.input withicon id="first_name"
                                                                                class="block w-full" type="text"
                                                                                name="first_name" :value="old(
                                                                                    'first_name',
                                                                                    $purchase->user->first_name,
                                                                                )"
                                                                                required autofocus
                                                                                placeholder="{{ __('First Name') }}"
                                                                                disabled />
                                                                        </x-form.input-with-icon-wrapper>
                                                                        <x-form.error :messages="$errors->get('first_name')" />
                                                                    </div>

                                                                    <!-- Last Name -->
                                                                    <div class="space-y-2">
                                                                        <x-form.label for="last_name"
                                                                            :value="__('Last Name')" />
                                                                        <x-form.input-with-icon-wrapper>
                                                                            <x-slot name="icon">
                                                                                <x-heroicon-o-user aria-hidden="true"
                                                                                    class="w-5 h-5" />
                                                                            </x-slot>
                                                                            <x-form.input withicon id="last_name"
                                                                                class="block w-full" type="text"
                                                                                name="last_name" :value="old(
                                                                                    'last_name',
                                                                                    $purchase->user->last_name,
                                                                                )"
                                                                                required
                                                                                placeholder="{{ __('Last Name') }}"
                                                                                disabled />
                                                                        </x-form.input-with-icon-wrapper>
                                                                        <x-form.error :messages="$errors->get('last_name')" />
                                                                    </div>

                                                                    <!-- Complete Name -->
                                                                    <div class="space-y-2">
                                                                        <x-form.label for="complete_name"
                                                                            :value="__('Complete Name')" />

                                                                        <x-form.input-with-icon-wrapper>
                                                                            <x-slot name="icon">
                                                                                <x-heroicon-o-user aria-hidden="true"
                                                                                    class="w-5 h-5" />
                                                                            </x-slot>

                                                                            <x-form.input withicon id="complete_name"
                                                                                class="block w-full" type="text"
                                                                                name="complete_name" :value="old(
                                                                                    'complete_name',
                                                                                    $purchase->user->complete_name,
                                                                                )"
                                                                                required
                                                                                placeholder="{{ __('Complete Name') }}"
                                                                                disabled />
                                                                        </x-form.input-with-icon-wrapper>
                                                                    </div>

                                                                    <!-- Email Address -->
                                                                    <div class="space-y-2">
                                                                        <x-form.label for="email"
                                                                            :value="__('Email')" />
                                                                        <x-form.input-with-icon-wrapper>
                                                                            <x-slot name="icon">
                                                                                <x-heroicon-o-mail aria-hidden="true"
                                                                                    class="w-5 h-5" />
                                                                            </x-slot>
                                                                            <x-form.input withicon id="email"
                                                                                class="block w-full" type="email"
                                                                                name="email" :value="old(
                                                                                    'email',
                                                                                    $purchase->user->email,
                                                                                )"
                                                                                required
                                                                                placeholder="{{ __('Email') }}"
                                                                                disabled />
                                                                        </x-form.input-with-icon-wrapper>
                                                                        <x-form.error :messages="$errors->get('email')" />
                                                                    </div>
                                                                    <!-- Mobile Phone -->
                                                                    <div class="space-y-2">
                                                                        <x-form.label for="mobile_phone"
                                                                            :value="__('Mobile Phone')" />
                                                                        <x-form.input-with-icon-wrapper>
                                                                            <x-slot name="icon">
                                                                                <x-heroicon-o-phone aria-hidden="true"
                                                                                    class="w-5 h-5" />
                                                                            </x-slot>
                                                                            <x-form.input withicon id="mobile_phone"
                                                                                class="block w-full" type="text"
                                                                                name="mobile_phone" :value="old(
                                                                                    'mobile_phone',
                                                                                    $purchase->user->mobile_phone,
                                                                                )"
                                                                                required
                                                                                placeholder="{{ __('Mobile Phone') }}"
                                                                                disabled />
                                                                        </x-form.input-with-icon-wrapper>
                                                                        <x-form.error :messages="$errors->get('mobile_phone')" />
                                                                    </div>
                                                                </div>

                                                                <div class="grid gap-6 w-full md:w-1/2">

                                                                    {{-- User Type --}}
                                                                    <div class="space-y-2">
                                                                        <x-form.label for="user_type"
                                                                            :value="__('Participant Type')" />
                                                                        <x-form.select :id="__('id_user_type')"
                                                                            :name="__('id_user_type')">
                                                                            <option value="">
                                                                                {{ __('Participant Type') }}
                                                                            </option>
                                                                            @foreach ($userTypes as $userType)
                                                                                <option value="{{ $userType->id }}"
                                                                                    {{ $userType->id == $purchase->user->id_user_type ? 'selected' : '' }}>
                                                                                    {{ $userType->type_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </x-form.select>
                                                                        <x-form.error :messages="$errors->get('id_user_type')" />
                                                                    </div>


                                                                    <!-- Institution -->
                                                                    <div class="space-y-2">
                                                                        <x-form.label for="institution"
                                                                            :value="__('Institution')" />
                                                                        <x-form.input-with-icon-wrapper>
                                                                            <x-slot name="icon">
                                                                                {{-- Optional icon for institution --}}
                                                                            </x-slot>
                                                                            <x-form.input withicon id="institution"
                                                                                class="block w-full" type="text"
                                                                                name="institution" :value="old(
                                                                                    'institution',
                                                                                    $purchase->user->institution,
                                                                                )"
                                                                                placeholder="{{ __('Institution') }}"
                                                                                disabled />
                                                                        </x-form.input-with-icon-wrapper>
                                                                        <x-form.error :messages="$errors->get('institution')" />
                                                                    </div>

                                                                    <!-- Occupation -->
                                                                    <div class="space-y-2">
                                                                        <x-form.label for="occupation"
                                                                            :value="__('Occupation')" />

                                                                        <x-form.input-with-icon-wrapper>
                                                                            <x-slot name="icon">
                                                                                <x-heroicon-o-academic-cap
                                                                                    aria-hidden="true"
                                                                                    class="w-5 h-5" />
                                                                            </x-slot>

                                                                            <x-form.input withicon id="occupation"
                                                                                class="block w-full" type="text"
                                                                                name="occupation" :value="old(
                                                                                    'occupation',
                                                                                    $purchase->user->occupation,
                                                                                )"
                                                                                placeholder="{{ __('Occupation') }}"
                                                                                disabled />
                                                                        </x-form.input-with-icon-wrapper>
                                                                    </div>

                                                                    <!-- Identity ID -->
                                                                    <div class="space-y-2">
                                                                        <x-form.label for="identity_id"
                                                                            :value="__('Identity ID')" />

                                                                        <x-form.input-with-icon-wrapper>
                                                                            <x-slot name="icon">
                                                                                <x-heroicon-o-academic-cap
                                                                                    aria-hidden="true"
                                                                                    class="w-5 h-5" />
                                                                            </x-slot>

                                                                            <x-form.input withicon id="identity_id"
                                                                                class="block w-full" type="number"
                                                                                name="identity_id" :value="old(
                                                                                    'identity_id',
                                                                                    $purchase->user->identity_id,
                                                                                )"
                                                                                placeholder="{{ __('Identity ID') }}"
                                                                                disabled />
                                                                        </x-form.input-with-icon-wrapper>
                                                                    </div>

                                                                    {{-- Identity Card --}}
                                                                    <div class="space-y-2">
                                                                        <label
                                                                            class="block text-sm font-medium text-gray-900 dark:text-white"
                                                                            for="small_size">Identity/Student Card</label>
                                                                        <img src="{{ route('user.student.card', ['id' => $purchase->user->id]) }}"
                                                                            alt="Student Card Image"
                                                                            onerror="handleImageErrorIdCard(this)">
                                                                        <script>
                                                                            function handleImageErrorIdCard(image) {
                                                                                // Change the image to a placeholder or handle the error visually
                                                                                image.alt = "There is no Student/Identity Card";
                                                                            }
                                                                        </script>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div
                                                            class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 gap-2">
                                                            <button
                                                                data-modal-hide="user-detail-modal-{{ $purchase->id }}"
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
