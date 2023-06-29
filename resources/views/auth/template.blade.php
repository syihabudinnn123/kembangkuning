<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css')}}"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--my css -->
    <link type="text/css" rel="stylesheet"href="{{ asset('css/footer.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">

<body>
    <!--Navbar-->
    @include('frontend.templates.partials.nav')
    @yield('content')
    @include('frontend.templates.partials.scripts')
    <footer class="page-footer teal lighten-2 center white-text" style="position:fixed;bottom:0;left:0;width:100%;">
        <div class="container">
          <div class="row">
              <h5 class="white-text"></b>Sistem Informasi Desa</b></h5>
              <p class="grey-text text-lighten-4">Sistem Informasi Desa Memudahkan Desa mengelola Data yang dimiliki.</p>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
          SIDESA. Copyright © 2020 Informatika 17
          </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    @include('frontend.templates.partials.message')
</body>
</html>
