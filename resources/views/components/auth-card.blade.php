<main class="flex flex-col items-center flex-1 px-4 pt-6 sm:justify-center">
    <div>
        {{-- <a href="/">
            <x-application-logo class="w-20 h-20" />
        </a> --}}
        <img src="{{ asset('assets/images/stikom-sm.png') }}" alt="stikom-logo" class="h-full">
        {{-- <img src="{{ asset('assets/images/help-university-logo.jpg') }}" alt="help" class="h-1/2"> --}}
    </div>

    <div
        class="w-full px-6 py-4 my-6 overflow-hidden bg-white rounded-md shadow-md {{ request()->routeIs('login') ? 'sm:max-w-md' : 'container' }} dark:bg-dark-eval-1">
        {{ $slot }}
    </div>
</main>
