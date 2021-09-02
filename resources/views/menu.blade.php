<aside class="menu">
    @foreach($menus as $menu)
        <p class="menu-label">{{ $menu->label }}</p>
        <ul class="menu-list">
            @foreach($menu->items as $item)
                <li>
                    <a href="{{ $item->link }}" class="{{ \Request::is($item->link) ? 'is-active' : '' }}">{{ $item->text }}</a>
                    @if($item->subMenu)
                        <ul>
                            @foreach($item->subMenu as $subMenuItem)
                                <li>
                                    <a href="{{ $subMenuItem->link }}" class="{{ \Request::is($item->link) ? 'is-active' : '' }}">{{ $subMenuItem->text }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    @endforeach
</aside>
