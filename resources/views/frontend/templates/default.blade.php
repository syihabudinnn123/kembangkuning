<!DOCTYPE html>
<html lang="en">
    @include('frontend.templates.partials.head')
<body>
    <!--Navbar-->
    @include('frontend.templates.partials.nav')
    <!--slider-->
    

    <!--Pengumuman-->

    @yield('content')


    @include('frontend.templates.partials.footer')
    @include('frontend.templates.partials.scripts')
</body>
</html>
