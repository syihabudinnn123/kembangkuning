<html lang="en">
    @include('frontend.templates.partials.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">

<body>
    <!--Navbar-->
    @include('frontend.templates.partials.nav')
    @yield('content')
    @include('frontend.templates.partials.scripts')
    @include('frontend.templates.partials.footer')



    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    @include('frontend.templates.partials.message')
    @laravelPWA
</body>
</html>
