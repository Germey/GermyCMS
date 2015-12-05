<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        @foreach ($menuItems as $menuItem)
            <li class="{{ array_key_exists('children', $menuItem)?'submenu':'' }} {{ in_array($menuItem['path'], $adminPath)?'active':'' }}">
                <a href="{{ URL('admin/'.$menuItem['path']) }}">
                    <i class="icon icon-{{ $menuItem['icon'] }}"></i>
                    <span>{{ $menuItem['text'] }}</span>
                </a>
                @if (array_key_exists('children', $menuItem))
                    <ul>
                        @foreach ($menuItem['children'] as $child)
                            <li>
                                <a href="{{ URL('admin/'.$menuItem['path'].'/'.$child['path']) }}">
                                    <i class="icon icon-{{ $child['icon'] }}"></i>
                                    <span>{{ $child['text'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        @if (!$adminPath)
            <script>
                $('#sidebar > ul > li:first-child').addClass('active');
            </script>
        @endif
    </ul>
</div>
<!--sidebar-menu-->