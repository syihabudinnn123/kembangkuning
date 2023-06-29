@extends('auth.template')

@section('content')
<div class="container">
    <h3> Masuk </h3>
    <form action="{{route ('login')}}" class="col s12" method="POST">
        @csrf
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input type="email" class="validate @error('email') invalid @enderror" name="email" value="{{old ('email') }}">
                <label for="">Email Address</label>
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
            <div class="row">
                <div class="input field right">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                    </a>
                    @endif
                    <button class="waves-effect pink lighten-2 btn" type="submit" name="action">Login
                        <i class="material-icons right">lock_open</i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
