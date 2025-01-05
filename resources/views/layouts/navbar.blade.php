<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand text-primary fw-bold" href="/">{{ __('messages.connectfriend') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('messages.toggle_navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ strtoupper(App::getLocale()) }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('setLocale', 'en') }}">{{ __('messages.english') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('setLocale', 'id') }}">{{ __('messages.bahasa') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('setLocale', 'cmn') }}">{{ __('messages.mandarin') }}</a>
                        </li>
                    </ul>
                </li>
                @auth
                    <li class="nav-item me-3">
                        <span class="nav-link text-secondary">{{ __('messages.hello') }}, <strong>{{ Auth::user()->name }}</strong>!</span>
                    </li>
                    <li class="nav-item"><a class="nav-link text-primary" href="{{ route('topup.index') }}">{{ __('messages.topup_coins') }}</a></li>
                    <li class="nav-item"><a class="nav-link text-primary" href="{{ route('avatar.collectors-angels') }}">{{ __('messages.collectors_angels') }}</a></li>
                    <li class="nav-item"><a class="nav-link text-primary" href="{{ route('user.profile') }}">{{ __('messages.profile') }}</a></li>
                    <li class="nav-item"><a class="nav-link text-primary" href="{{ route('wishlist.index') }}">{{ __('messages.friends') }}</a></li>
                    <li class="nav-item"><a class="nav-link text-primary" href="{{ route('avatar.index') }}">{{ __('messages.avatars') }}</a></li>
                    <li class="nav-item"><a class="nav-link text-primary" href="{{ route('settings.index') }}">{{ __('messages.settings') }}</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-primary" style="padding: 0; border: none; background: none;">{{ __('messages.logout') }}</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link text-primary" href="{{ route('user.login') }}">{{ __('messages.login') }}</a></li>
                    <li class="nav-item"><a class="nav-link text-primary" href="{{ route('user.register') }}">{{ __('messages.register') }}</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
