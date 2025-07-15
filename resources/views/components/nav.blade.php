@props(["active" => false])

@php
    $current = "bg-gray-200 text-black";
    $default = "text-gray-300 hover:bg-gray-200 hover:text-black";
@endphp

<a class="rounded-md px-3 py-2 text-md font-medium {{ $active ? $current : $default }}"  aria-current="page" {{ $attributes }}>
    {{ $slot }}
</a>
