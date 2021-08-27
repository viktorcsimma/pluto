<!--navbar-->
<div class="navbar-fixed">
    <nav class="top-nav">
        <div class="nav-wrapper">
            <div class="row">
                <!--sidenav trigger for mobile-->
                <a href="#" data-target="sidenav" class="sidenav-trigger hide-on-large-only"><i
                        class="material-icons">menu</i></a>
                <!--logo for mobile-->
                <a class="brand-logo center hide-on-large-only"
                    style="text-transform: uppercase;font-weight:300;letter-spacing:3px;" href="{{ url('/') }}">
                    {{ config('app.name', 'Pluto') }} </a>
                <!--title-->
                <div class="col hide-on-med-and-down noselect" style="margin-left:310px">
                    @yield('title')
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="right hide-on-med-and-down">
                    @guest
                        <li><a class="waves-effect" href="{{ route('login') }}">@lang('user.login')</a></li>
                        <li><a class="waves-effect" href="{{ route('register') }}">@lang('user.register')</a></li>
                    @else
                        <li><a class="waves-effect" href="#"><i class="material-icons left">account_circle</i>{{ auth()->user()->name }}</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>

<!--sidebar-->
<ul class="sidenav sidenav-fixed" id="sidenav">
    <!-- logo -->
    @include('layouts.logo')

    <!-- main options -->
    @guest
        <div class="hide-on-large-only">
            <li><a class="waves-effect" href="{{ route('login') }}">@lang('general.login')</a></li>
            <li><a class="waves-effect" href="{{ route('register') }}">@lang('general.register')</a></li>
        </div>
    @else
        <div class="hide-on-large-only">
            <li><a class="waves-effect" href="#"><i class="material-icons left">account_circle</i>{{ auth()->user()->name }}</a></li>
        </div>
        
    @endguest

    
    <li>
        <ul class="collapsible collapsible-accordion">
            <!-- language select -->
            <li>
                <a class="collapsible-header waves-effect" style="padding-left:32px">
                    <i class="material-icons left">language</i>Language
                    <i class="material-icons right">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        @foreach (config('app.locales') as $code => $name)
                        <li><a class="waves-effect" href="{{ route('setlocale', $code) }}">{{ $name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
        </ul>
    </li>

    <!-- logout -->
    @auth
        <li>
            <a class="waves-effect" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="material-icons left">login</i>@lang('user.logout')
            </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
</ul>

