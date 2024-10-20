@props(['active' => false, 'isButton' => false])

<a class="{{ $isButton ? 'theme-btn' : ($active ? 'nav-link active' : 'nav-link') }}"
    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
    <span>
        {{ $slot }}
    </span>
</a>
