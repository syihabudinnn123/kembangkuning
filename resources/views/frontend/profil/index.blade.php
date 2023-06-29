@extends('frontend.templates.default')

@section('content')
@if($slider->isNotEmpty())
<div class="slider">
  <ul class="slides">
    @foreach($slider as $value)
      
    
    <li>
      <img src="{{asset(''.$value->cover)}}">
      <div class="caption center-align">
        <h3><b></b></h3>
        <h5 class="light grey-text text-lighten-3"><b></b></h5>
      </div>
    </li>
    @endforeach
  </ul>
</div>
@else
<div class="slider">
  <ul class="slides">
    <li>
      <img src="https://blog.tiket.com/wp-content/uploads/2020/11/Tempat-Wisata-di-Magelang-1.jpg">
      <div class="caption center-align">
        <h3><b>SELAMAT DATANG DI KEMBANGKUNING</b></h3>
        <h5 class="light grey-text text-lighten-3"><b>Akses Cepat Informasi Desamu Sekarang.</b></h5>
      </div>
    </li>
    <li>
      <img src="{{asset('assets/dist/img/slider/img2.png')}}">
      <div class="caption left-align">
        <h3><b>SELAMAT DATANG DI SIDESA</b></h3>
        <h5 class="light grey-text text-lighten-3"><b>Akses Cepat Informasi Desamu Sekarang.</b></h5>
      </div>
    </li>
    <li>
      <img src="{{asset('assets/dist/img/slider/img6.png')}}">
      <div class="caption right-align">
        <h3><b>SELAMAT DATANG DI SIDESA</b></h3>
        <h5 class="light grey-text text-lighten-3"><b>Akses Cepat Informasi Desamu Sekarang.</b></h5>
      </div>
    </li>
    <li>
      <img src="{{asset('assets/dist/img/slider/img4.png')}}">
      <div class="caption center-align">
        <h3><b>SELAMAT DATANG DI SIDESA</b></h3>
        <h5 class="light grey-text text-lighten-3"><b>Akses Cepat Informasi Desamu Sekarang.</b></h5>
      </div>
    </li>
    <li>
      <img src="{{asset('assets/dist/img/slider/img5.png')}}">
      <div class="caption center-align">
        <h3><b>SELAMAT DATANG DI SIDESA</b></h3>
        <h5 class="light grey-text text-lighten-3"><b>Akses Cepat Informasi Desamu Sekarang.</b></h5>
      </div>
    </li>
  </ul>
</div>
@endif
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <h2 class="center">Data SIDESA</h2>
        <div class="col s12 m6">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Data Warga</h5>
            <div class="center">
                <h4 id="count">{{ $warga }}</h4>
            </div>
          </div>
        </div>

        <div class="col s12 m6">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">nature_people</i></h2>
            <h5 class="center">Data Perkebunan</h5>
            <div class="center">
                <h4 id="counter">{{ $kebun }}</h4>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

 
  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Kelola Desamu sekarang dengan SIDESA</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{{ asset('assets/frontend_user/pemandangan3.jpg') }}" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">
    @foreach ($profil as $p)


      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Sejarah Desa</h4>
          <p class="left-align light">{!! $p->sejarah!!}</p>
        </div>
      </div>

    </div>
  </div>

  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Kelola Desamu sekarang dengan SIDESA</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{{ asset('assets/frontend_user/pemandangan2.jpg') }}" alt="Unsplashed background img 3"></div>
  </div>
  <section id="about" class="about">
    <div class="container">
        <div class="row">
             <h4 class="center light grey-text text-darken-3 ">Tentang SIDESA</h4>
             <div class="col m6 light">
                 <h5>SIDESA</h5>
                 <p>{!! $p->tentang !!}</p>
             </div>
             <div class="col m6 light">
                 <h5>Fungsi SIDESA</h5>
                 <p>{{ $p->fungsi }}</p>
             </div>
        </div>
    </div>
</section>
  @endforeach
  <!--  Scripts-->

  <script type="text/javascript">
     function animateValue(obj, start = 0, end = null, duration = 3000) {
    if (obj) {

        // save starting text for later (and as a fallback text if JS not running and/or google)
        var textStarting = obj.innerHTML;

        // remove non-numeric from starting text if not specified
        end = end || parseInt(textStarting.replace(/\D/g, ""));

        var range = end - start;

        // no timer shorter than 50ms (not really visible any way)
        var minTimer = 50;

        // calc step time to show all interediate values
        var stepTime = Math.abs(Math.floor(duration / range));

        // never go below minTimer
        stepTime = Math.max(stepTime, minTimer);

        // get current time and calculate desired end time
        var startTime = new Date().getTime();
        var endTime = startTime + duration;
        var timer;

        function run() {
            var now = new Date().getTime();
            var remaining = Math.max((endTime - now) / duration, 0);
            var value = Math.round(end - (remaining * range));
            // replace numeric digits only in the original string
            obj.innerHTML = textStarting.replace(/([0-9]+)/g, value);
            if (value == end) {
                clearInterval(timer);
            }
        }

        timer = setInterval(run, stepTime);
        run();
    }
}

animateValue(document.getElementById("count"));
  </script>

<script type="text/javascript">
    function animateValue(obj, start = 0, end = null, duration = 3000) {
   if (obj) {

       // save starting text for later (and as a fallback text if JS not running and/or google)
       var textStarting = obj.innerHTML;

       // remove non-numeric from starting text if not specified
       end = end || parseInt(textStarting.replace(/\D/g, ""));

       var range = end - start;

       // no timer shorter than 50ms (not really visible any way)
       var minTimer = 50;

       // calc step time to show all interediate values
       var stepTime = Math.abs(Math.floor(duration / range));

       // never go below minTimer
       stepTime = Math.max(stepTime, minTimer);

       // get current time and calculate desired end time
       var startTime = new Date().getTime();
       var endTime = startTime + duration;
       var timer;

       function run() {
           var now = new Date().getTime();
           var remaining = Math.max((endTime - now) / duration, 0);
           var value = Math.round(end - (remaining * range));
           // replace numeric digits only in the original string
           obj.innerHTML = textStarting.replace(/([0-9]+)/g, value);
           if (value == end) {
               clearInterval(timer);
           }
       }

       timer = setInterval(run, stepTime);
       run();
   }
}

animateValue(document.getElementById("counter"));
 </script>

@endsection
