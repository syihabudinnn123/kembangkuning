@extends('frontend.defaultHead')

@section('content')
<div class="container">
    <h3> Daftar </h3>
    <form action="{{route ('register')}}" class="col s12" method="POST">
        @csrf
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">person</i>
                <input type="text" class="@error('name') invalid @enderror" name="name" value="{{old ('name') }}">
                <label for="">Nama</label>
                @error('name')
                    <span class="helper-text" data-error="{{ $message }}"></span>
                @enderror
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input type="email" class="validate @error('email') invalid @enderror" name="email" value="{{old ('email') }}">
                <label for="">Email</label>
                @error('email')
                    <span class="helper-text" data-error="{{ $message }}"></span>
                @enderror
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">lock</i>
                <input type="password" class="@error('password') invalid @enderror" name="password" value="{{old ('email') }}">
                <label for="">Password</label>
                @error('password')
                    <span class="helper-text" data-error="{{ $message }}"></span>
                @enderror
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">lock</i>
                <input type="password" class="@error('password_confirmation') invalid @enderror" name="password_confirmation" value="{{old ('email') }}">
                <label for="">Konfirmasi Password</label>
                @error('password_confirmation')
                    <span class="helper-text" data-error="{{ $message }}"></span>
                @enderror
            </div>
            <div class="input field  right">
                <button class="waves-effect pink lighten-2 btn" type="submit" name="action">Daftar
                    <i class="material-icons left">keyboard_tab</i>
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
