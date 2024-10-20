<!DOCTYPE html>
<html lang="en">

<x-head>

</x-head>

<body class="home-2">

    {{ $slot }}

    <!--=======================================
    All Jquery Script link
    ===========================================-->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- ==== Plugin JavaScript ==== -->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <!--Wow Script-->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>

    <!--Iconify Icon-->
    <script src="{{ asset('assets/js/iconify.min.js') }}"></script>

    <!-- Standalone Js Script Start -->

    <!-- Standalone Js Script End -->

    <!-- Menu js -->
    <script src="{{ asset('assets/js/menu.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
