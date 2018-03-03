<nav>
          <ul class="nav navbar-nav">
            @foreach(\App\Menu::orderBy('position' , 'asc')->get() as $menu)
                @if($menu->published === 1)
                    <li><a href="{{  $menu->you_url ? '/' . $menu->you_url : '/' . $menu->url }}">{{ $menu->title }}</a> </li>
                @endif
            @endforeach
        </ul>
      </nav>