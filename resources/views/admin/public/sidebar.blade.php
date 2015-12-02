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
                    <!--
        <li>
            <a href="{{ URL('admin') }}">
                <i class="icon icon-signal"></i><span>首页</span>
            </a>
        </li>
        <li>
            <a href="{{ URL('admin/article') }}">
                <i class="icon icon-signal"></i><span>文章管理</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="icon icon-signal"></i><span>评论管理</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="icon icon-signal"></i><span>目录管理</span>
            </a>
        </li>
        <li>
            <a href="{{ URL('admin/tag') }}">
                <i class="icon icon-home"></i><span>标签管理</span>
            </a>
        </li>
        <li class="submenu">
            <a href="#">
                <i class="icon icon-th-list"></i><span>媒体管理</span>
            </a>
            <ul>
                <li><a href="#">图片</a></li>
                <li><a href="#">视频</a></li>
                <li><a href="#">音频</a></li>
                <li><a href="#">文件</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="icon icon-signal"></i><span>人员管理</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="icon icon-signal"></i><span>图文管理</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="icon icon-signal"></i><span>菜单管理</span>
            </a>
        </li>

        <li><br></li>

        <li>
            <a href="#">
                <i class="icon icon-signal"></i><span>个人详情</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="icon icon-signal"></i><span>我的发布</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="icon icon-signal"></i><span>我的关注</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="icon icon-signal"></i><span>我的收藏</span>
            </a>
        </li>


        <li>
            <a href="#">
                <i class="icon icon-signal"></i><span>站点信息</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="icon icon-signal"></i><span>缓存管理</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="icon icon-signal"></i><span>数据备份</span>
            </a>
        </li>
        -->
    </ul>
</div>
<!--sidebar-menu-->