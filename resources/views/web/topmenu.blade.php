<nav>
          <ul class="nav navbar-nav">
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
      </nav>