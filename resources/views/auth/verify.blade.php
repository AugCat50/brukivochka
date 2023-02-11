@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <!-- {{ __('Verify Your Email Address') }} -->
                    {{ __('Подтвердите ваш Email') }}
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            <!-- {{ __('A fresh verification link has been sent to your email address.') }} -->
                            {{ __('Ссылка подтверждения отправлена на ваш Email.') }}
                            
                        </div>
                    @endif

                    <!-- {{ __('Before proceeding, please check your email for a verification link.') }} -->
                    {{ __('Прежде чем продолжить, проверьте свою электронную почту на наличие ссылки для подтверждения.') }}
                    <!-- {{ __('If you did not receive the email') }}, -->
                    {{ __('Если вы не получили письмо') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
