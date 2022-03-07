<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Laravel Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link text-white" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{url('/about')}}">About</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/services">Services</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{url('/posts')}}">Blog</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Contact</a></li>
            </ul>

                        
            <ul class="navbar-nav ms-auto me-3">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item me-3"><a class="btn btn-outline-light" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item"><a class="btn btn-outline-light" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}</a>

                        <div class="dropdown-menu shadow dropdown-menu-end bg-light" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('/dashboard')}}">{{ __('Dashboard') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>