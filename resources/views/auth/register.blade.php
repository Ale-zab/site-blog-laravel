@section('title', 'Регистрация')
@extends('common.layout')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('register') }}" class="form-auth">
            @csrf

            <div class="form-auth__item">
                <label class="form-auth__lable form-label">{{ __('Имя') }}</label>
                <input class="form-auth__input form-control" type="text" name="name" placeholder="Имя"
                       value="{{ old('name') }}" required autofocus autocomplete="name"/>

                @error('name')
                <div class="error-form">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-auth__item">
                <label class="form-auth__lable form-label">{{ __('Email') }}</label>
                <input class="form-auth__input form-control" type="email" name="email" placeholder="Email"
                       value="{{ old('email') }}" required/>

                @error('email')
                <div class="error-form">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-auth__item">
                <label class="form-auth__lable form-label">{{ __('Пароль') }}</label>
                <input class="form-auth__input form-control" type="password" name="password"
                       placeholder="Пароль" required autocomplete="new-password"/>

                @error('password')
                <div class="error-form">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-auth__item">
                <label class="form-auth__lable form-label">{{ __('Повторите пароль') }}</label>
                <input class="form-auth__input form-control" type="password" name="password_confirmation"
                       placeholder="Повторите пароль" required autocomplete="new-password"/>

                @error('password_confirmation')
                <div class="error-form">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <a class="form-auth__link" href="{{ route('login') }}">
                {{ __('Войти') }}
            </a>

            <div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
@endsection
