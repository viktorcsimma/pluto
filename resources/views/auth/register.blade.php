@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12 l8 xl6 offset-l2 offset-xl3">
            <div class="card">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" name="name" type="text" value="{{ old('name') }}"
                                    class="validate  @error('name') invalid @enderror" required autocomplete="name"
                                    autofocus>
                                <label for="name">
                                    @lang('user.name')
                                </label>
                                @error('name')
                                    <span class="helper-text" data-error="{{ $message }}"></span>
                                @enderror
                            </div>
                            <div class="input-field col s12">
                                <input id="email" name="email" type="email" value="{{ old('email') }}"
                                    class="validate  @error('email') invalid @enderror" required autocomplete="email">
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
                                    autocomplete="new-password">
                                <label for="password">
                                    @lang('user.password')
                                </label>
                                @error('password')
                                    <span class="helper-text" data-error="{{ $message }}">
                                    </span>
                                @enderror
                            </div>
                            <div class="input-field col s12">
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="validate @error('password_confirmation') invalid @enderror" required
                                    autocomplete="new-password">
                                <label for="password_confirmation">
                                    @lang('user.password_confirm')
                                </label>
                                @error('password_confirmation')
                                    <span class="helper-text" data-error="{{ $message }}">
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="waves-effect waves-light btn">@lang('user.register')</button>
                    </div>
                </form>

            </div>
        </div>
    @endsection
