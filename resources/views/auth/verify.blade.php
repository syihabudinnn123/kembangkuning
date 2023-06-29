@extends('auth.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12-m6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">{{ __('Verify Your Email Address') }}</span>
                    <div class="card-content white-textcontent white-text">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="waves-effect waves-light btn center">{{ __('click here to request another') }}</button>.
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
