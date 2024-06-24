<nav class="header__menu mobile-menu">
    <ul>
        @foreach ($listMenu->where('level', 1) as $menu)
            @if ($listMenu->where('parent_id', $menu->menu_id)->count() > 0)
                <li><a href="{{ $menu->link }}">{{ $menu->menu_name }}</a>
                    <ul class="dropdown">
                        @foreach ($listMenu->where('parent_id', $menu->menu_id)->where('level', 2)->sortBy('menu_order') as $smenu)
                        <li><a href="#">{{ $smenu->menu_name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li class=""><a href="{{ $menu->link }}">{{ $menu->menu_name }}</a></li>
            @endif
        @endforeach
    </ul>
</nav>
