<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    @if (auth()->user()->id_user_type == 1)
        <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
            <x-slot name="icon">
                <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </x-slot>
        </x-sidebar.link>
    @else
        <x-sidebar.link title="Dashboard" href="{{ route('user.dashboard') }}" :isActive="request()->routeIs('user.dashboard')">
            <x-slot name="icon">
                <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </x-slot>
        </x-sidebar.link>
    @endif

    @if (auth()->user()->id_user_type == 1)
        @if (auth()->user()->email == 'finance@esgbali.org')
            <x-sidebar.link title="Purchases" href="{{ route('purchase.index') }}" :isActive="request()->routeIs('purchase.index')">
            </x-sidebar.link>
            <x-sidebar.link title="Verified Purchases" href="{{ route('purchase.verified') }}" :isActive="request()->routeIs('purchase.verified')">
            </x-sidebar.link>
            <x-sidebar.link title="Users" href="{{ route('users.index') }}" :isActive="request()->routeIs('users.index') ||
                request()->routeIs('users.create') ||
                request()->routeIs('users.edit')">
            </x-sidebar.link>
        @else
            <x-sidebar.link title="Admin" href="{{ route('users.admin') }}" :isActive="request()->routeIs('users.admin')">
            </x-sidebar.link>
            <x-sidebar.link title="Users" href="{{ route('users.index') }}" :isActive="request()->routeIs('users.index') ||
                request()->routeIs('users.create') ||
                request()->routeIs('users.edit')">
            </x-sidebar.link>
            <x-sidebar.link title="User Types" href="{{ route('user-types.index') }}" :isActive="request()->routeIs('user-types.index') ||
                request()->routeIs('user-types.create') ||
                request()->routeIs('user-types.edit')">
            </x-sidebar.link>
            <x-sidebar.link title="Products" href="{{ route('products.index') }}" :isActive="request()->routeIs('products.index')">
            </x-sidebar.link>
            <x-sidebar.link title="Purchases" href="{{ route('purchase.index') }}" :isActive="request()->routeIs('purchase.index')">
            </x-sidebar.link>
            <x-sidebar.link title="Verified Purchases" href="{{ route('purchase.verified') }}" :isActive="request()->routeIs('purchase.verified')">
            </x-sidebar.link>
            <x-sidebar.link title="Check In" href="{{ route('checkin.index') }}" :isActive="request()->routeIs('checkin.index')">
        @endif
    @endif
    @endif

</x-perfect-scrollbar>
