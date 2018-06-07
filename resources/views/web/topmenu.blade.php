@foreach(\App\Menu::orderBy('position' , 'asc')->get() as $menu)
    @if($menu->published === 1)
<div class="header__item headerButton">
    <a href="{{  $menu->you_url ? '/' . $menu->you_url : '/' . $menu->url }}">{{ $menu->title }}</a>
    @endif
</div>
@endforeach
