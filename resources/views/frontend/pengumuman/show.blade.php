@extends('frontend.defaultHead')

@section('content')
<div class="container">
    <div class="col s12 m12">
        @if (session('success_message'))
        <div class="card-panel green accent-3 white-text">
           <b> {{ session('success_message') }} </b>
        </div>
        @endif
        <div class="card hoverable">
            {{-- <div class="card-image"> --}}
                <img src="{{ $pengumuman->getGambar()  }}"height="380x">
            {{-- </div> --}}
            <div class="card-content">
                <h4 class="red-text accent-2">{{ $pengumuman->nama }}</h4>
                <blockquote>
                    <p>{{ $pengumuman->deskripsi }}</p>
                </blockquote>
                <br>
                <p>{{ $pengumuman->tanggal }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-title center">Komentar</div>
            @foreach ($pengumuman->comment()->get()  as $comment)
                <div class="divider"> Test</div>
                <div class="section center">
                    <h6>{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</h6>
                    <p> <b><u>{{ $comment->message }} </u></b></p>
                </div>
            @endforeach
            <div class="card-content">
                <form action="{{ route('comment.store', $pengumuman) }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="input-field">
                        <i class="material-icons prefix">comment</i>
                        <textarea name="message" class="materialize-textarea"></textarea>
                        <label for="pesan">Komentar</label>
                    </div>
                    <button class="btn waves-effect waves-light mr" type="submit" name="action">Kirim Komentar
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
    @include('sweetalert::alert')
@endsection
