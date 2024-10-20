<x-d-head></x-d-head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        {{-- <x-spinner></x-spinner> --}}
        <x-d-sidebar></x-d-sidebar>
        <div class="content">
            <x-d-navbar></x-d-navbar>
            {{ $slot }}
            <x-d-footer></x-d-footer>
        </div>
    </div>
    <x-d-foot></x-d-foot>
</body>

</html>
