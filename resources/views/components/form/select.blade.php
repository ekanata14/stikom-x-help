@props([
    'disabled' => false,
    'withicon' => false,
    'id' => '',
    'name' => ''
])

@php
    $withiconClasses = $withicon ? 'pl-11 pr-4' : 'px-4';
@endphp

<select
    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-opacity-50 focus:border-gray-400 focus:ring
            focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
            dark:text-gray-300 dark:focus:ring-offset-dark-eval-1" id={{ $id }} name={{ $name }}>
    {{ $slot }}
</select>
