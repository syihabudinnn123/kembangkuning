@extends('frontend.templates.default')

@section('content')
<section id="pengumuman" class="pengumuman">
    <div class="container">
        <div class="row">
            <h4 class="center light grey-text text-darken-3">Pengumuman</h4>
            @foreach ($pengumuman as $pengumuman)
            <div class="col s12 m6">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="{{ $pengumuman->getGambar()  }}" height="150px">
                    </div>
                    <div class="card-content">
                        <h5>
                            <a href="{{ route('pengumuman.show', $pengumuman) }}">{{ Str::limit($pengumuman->nama, 15) }}</a>
                        </h5>
                        <p>{{ Str::limit($pengumuman->deskripsi, 100) }}</p>
                        <br>
                        <p>{{ $pengumuman->tanggal }}</p>
                    </div>
                    <div class="card-action">
                    <a href="{{ route('pengumuman.show', $pengumuman) }}">Baca Selengkapnya</a>      
                    </div>       
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection