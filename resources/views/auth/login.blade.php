@section('title', 'Вход')
@extends('common.layout')

@section('content')
    <div class="container">

        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div>
                <div>{{ __('Whoops! Something went wrong.') }}</div>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="form-auth">
            @csrf

            <div class="form-auth__item">
                <label class="form-auth__lable form-label">{{ __('Email') }}</label>
                <input class="form-auth__input form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus/>
            </div>

            <div class="form-auth__item">
                <label class="form-auth__lable form-label">{{ __('Пароль') }}</label>
                <input class="form-auth__input form-control" placeholder="Пароль" type="password" name="password" required autocomplete="current-password"/>
            </div>

            <div class="form-auth__item">
                <label class="form-auth__lable form-label">{{ __('Запомнить меня') }}</label>
                <input class="form-auth__checkbox form-check-input" type="checkbox" name="remember">
            </div>


            @if (Route::has('password.request'))
                <a class="form-auth__link" href="{{ route('password.request') }}">
                    {{ __('Забыли пароль?') }}
                </a>
            /
                <a href="/register">Зарегистрироваться</a>
            @endif

            <div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Войти') }}
                </button>
            </div>
        </form>
    </div>
@endsection
