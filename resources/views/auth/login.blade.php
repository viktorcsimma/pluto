@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12 l8 xl6 offset-l2 offset-xl3">
            <div class="card">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" name="email" type="email" value="{{ old('email') }}"
                                    class="validate  @error('email') invalid @enderror" required autocomplete="email"
                                    autofocus>
                                <label for="email">
                                    @lang('user.email')
                                </label>
                                @error('email')
                                    <span class="helper-text" data-error="{{ $message }}"></span>
                                @enderror
                            </div>
                            <div class="input-field col s12">
                                <input id="password" name="password" type="password"
                                    class="validate @error('password') invalid @enderror" required
                                    autocomplete="current-password">
                                <label for="password">
                                    @lang('user.password')
                                </label>
                                @error('password')
                                    <span class="helper-text" data-error="{{ $message }}">
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <span class="helper-text right">
                            <a href="{{ route('password.request') }}">
                                @lang('user.forgotpwd')
                            </a>
                        </span>
                    </div>
                    <div class="card-action">
                        <span class="right">
                            <label>
                                <input type="checkbox" name="remember">
                                <span>@lang('user.remember_me')</span>
                            </label>
                        </span>
                        <button type="submit" class="waves-effect waves-light btn">@lang('user.login')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
