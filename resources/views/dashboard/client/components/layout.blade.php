<x-c-head></x-c-head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        {{-- <x-spinner></x-spinner> --}}
        <x-c-sidebar></x-c-sidebar>
        <div class="content">
            <x-c-navbar></x-c-navbar>
            {{ $slot }}
            <x-c-footer></x-c-footer>
        </div>
    </div>
    <x-c-foot></x-c-foot>
</body>

</html>
