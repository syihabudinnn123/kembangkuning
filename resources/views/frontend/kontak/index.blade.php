@extends('frontend.defaultHead')

@section('content')
<style>



</style>
    <div class="container">
        <h3 class="light grey-text text-darken-3 center">Hubungi Kami</h3>
        @if (session('success_message'))
        <div class="card-panel green accent-3 white-text">
           <b> {{ session('success_message') }} </b>
        </div>
        @endif
        <div class="row">
            <div class="col m5 s12">
                
                <div class="card-panel teal lighten-2 center white-text">
                    <i class="material-icons medium">email</i>
                    <h4>Kontak</h4>
                    <p>Hubungin Kontak Desa Dibawah Ini</p>
                </div>
                <ul class="collection with-header">
                    <li class="collection-header"><h5>{{ $profil->nama }}</h5></li>
                    <li class="collection-item">{{ $profil->alamat }}</li>
                    <li class="collection-item">{{ $profil->telp }} </li>
                    <li class="collection-item">{{ $profil->email }}</li>
                </ul>
                
            </div>
            <div class="col m7 s12">
                <form action="{{ route('kontak.store')}}" method="POST">
                    @csrf
                    <div class="card-panel">
                        <h4>Silahkan Hubungi Kami</h4>
                        <div class="input-field">
                            <i class="material-icons prefix">person</i>
                            <input type="text" name="nama" required class="validate">
                            <label for="nama">Nama</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">email</i>
                            <input type="email" name="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">call</i>
                            <input type="text" name="telp">
                            <label for="telp">No Handphone</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">comment</i>
                            <textarea name="pesan" class="materialize-textarea"></textarea>
                            <label for="pesan">Pesan</label>
                        </div>
                        <button type="submit" id="btnresult"class="btn">Kirim <i class="material-icons right">send</i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col s12 l12">
                <div class="card teal lighten-2 ">
                    <div class="card-content white-text ">
                        <center>
                            {!! $profil->lokasi !!}
                        </center>
                    </div>

                  </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
@endsection
