<!-- 顶部导航栏 -->
<nav class="headroom" id="top-navi">
    <div id="menu-btn">
        <div class="menu-btn-bar">
        </div>
        <div class="menu-btn-bar">
        </div>
        <div class="menu-btn-bar">
        </div>
    </div>
    <div class="top-navi-content">
        <a class="top-navi-logo" href="{{ route('home.index') }}">
            <img alt="{{ get_config('web_name') }}" src="{{ get_config('web_logo') }}">

        </a>
        <a class="top-navi-search-btn" href="{{ route('tags') }}" title="搜索博客内容">
            <i class="fa fa-search" aria-hidden="true" style="height:60px;line-height:60px;display:inline-block;">
            </i>
        </a>
        <div class="main-menu">
            <ul class="menu">
                <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-1202 active">
                    <a href="/">
                        首页
                    </a>
                </li>
                @foreach($navbars as $navbar)
                <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-1202 active">
                    @if(empty($navbar->children))
                    <a href="{{ route('nav.'.$navbar->url) }}">
                        {{ $navbar->name }}
                    </a>
                    @else
                    <a href="{{ route('nav.'.$navbar->url) }}">
                        {{ $navbar->name }}
                    </a>
                    <ul class="sub-menu">
                        @foreach($navbar->children as $nav)
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1205">
                            <a href="{{ route('nav.'.$nav->url) }}">
                                {{ $nav->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>