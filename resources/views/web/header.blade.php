@section('header')


    <header >
        <nav class="header__section">
            <div class="header__item headerlogo">
                <a href="/" class="logoMenu">MaxBeast</a>
            </div>
        </nav>
        <nav class="header__section">
            @include('web.topmenu')
        </nav>
        <nav class="header__section">
            <div class="header__item headerButton search">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                     width="35" height="35"
                     viewBox="0 0 50 50">    <path style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="M 7 4 C 5.3545455 4 4 5.3545455 4 7 L 4 43 C 4 44.645455 5.3545455 46 7 46 L 43 46 C 44.645455 46 46 44.645455 46 43 L 46 7 C 46 5.3545455 44.645455 4 43 4 L 7 4 z M 7 6 L 43 6 C 43.554545 6 44 6.4454545 44 7 L 44 43 C 44 43.554545 43.554545 44 43 44 L 7 44 C 6.4454545 44 6 43.554545 6 43 L 6 7 C 6 6.4454545 6.4454545 6 7 6 z M 22.5 13 C 17.26514 13 13 17.26514 13 22.5 C 13 27.73486 17.26514 32 22.5 32 C 24.758219 32 26.832076 31.201761 28.464844 29.878906 L 36.292969 37.707031 L 37.707031 36.292969 L 29.878906 28.464844 C 31.201761 26.832076 32 24.758219 32 22.5 C 32 17.26514 27.73486 13 22.5 13 z M 22.5 15 C 26.65398 15 30 18.34602 30 22.5 C 30 26.65398 26.65398 30 22.5 30 C 18.34602 30 15 26.65398 15 22.5 C 15 18.34602 18.34602 15 22.5 15 z" font-weight="400" font-family="sans-serif" white-space="normal" overflow="visible"></path></svg>

            </div>
            @guest
            <div class="header__item headerButton">
                <a href="{{ route('login') }}">Войти</a>

            </div>
            @else
                <div class="header__item headerButton">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                </div>
                <div class="header__item headerButton">
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="{{action('UserController@index', auth()->user()->id)}}">Личный кабинет</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    </div>
                @endguest

        </nav>
    </header>


   {{-- <ul class="nav navbar-nav">
        @foreach(\App\Menu::orderBy('position' , 'asc')->get() as $menu)
            @if($menu->published === 1)
                <li><a href="{{  $menu->you_url ? '/' . $menu->you_url : '/' . $menu->url }}">{{ $menu->title }}</a> </li>
            @endif
        @endforeach

    </ul>
    <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @guest
        <li><a href="{{ route('login') }}">Войти</a></li>
        <li><a href="{{ route('register') }}">Регистрация</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="{{action('UserController@index', auth()->user()->id)}}">Личный кабинет</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            @endguest
    </ul>
    </nav>--}}


@endsection
