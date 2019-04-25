<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ \Auth::guard('admin')->user()->avatar }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ \Auth::guard('admin')->user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- 一级菜单 -->
        <li><a href="{{ route('admin.index') }}" class="pjax-a"><i class="fa fa-dashboard"></i> <span>首页</span></a></li>
        <li class="treeview @if(admin_nav_active('article')) active @endif">
            <a href="#">
                <i class="fa fa-connectdevelop fa-fw"></i>
                <span>文章管理</span>
                <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
            </a>
            <ul class="treeview-menu">
                <li class=""><a href="{{ route('article.index') }}"  class="pjax-a"><i class="fa fa-apple fa-fw"></i> 文章列表</a></li>
                <li class=""><a href="{{ route('article.create') }}"  class="pjax-a"><i class="fa fa-krw fa-fw"></i> 文章添加</a></li>
            </ul>
        </li>
        <li class="treeview @if(admin_nav_active('nav')) active @endif">
            <a href="#">
                <i class="fa fa-connectdevelop fa-fw"></i>
                <span>导航管理</span>
                <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
            </a>
            <ul class="treeview-menu">
                <li class=""><a href="{{ route('nav.index') }}"  class="pjax-a"><i class="fa fa-apple fa-fw"></i> 导航列表</a></li>
                <li class=""><a href="{{ route('nav.create') }}"  class="pjax-a"><i class="fa fa-krw fa-fw"></i> 导航添加</a></li>
            </ul>
        </li>
        <li class="treeview @if(admin_nav_active('weiyu')) active @endif">
            <a href="#">
                <i class="fa fa-connectdevelop fa-fw"></i>
                <span>微语</span>
                <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
            </a>
            <ul class="treeview-menu">
                <li class=""><a href="{{ route('weiyu.index') }}"  class="pjax-a"><i class="fa fa-apple fa-fw"></i> 微语列表</a></li>
                <li class=""><a href="{{ route('weiyu.create') }}"  class="pjax-a"><i class="fa fa-krw fa-fw"></i> 微语添加</a></li>
            </ul>
        </li>
        <li class="treeview @if(admin_nav_active('level')) active @endif">
            <a href="#">
                <i class="fa fa-connectdevelop fa-fw"></i>
                <span>等级管理</span>
                <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
            </a>
            <ul class="treeview-menu">
                <li class=""><a href="{{ route('level.index') }}"  class="pjax-a"><i class="fa fa-apple fa-fw"></i> 等级列表</a></li>
                <li class=""><a href="{{ route('level.create') }}"  class="pjax-a"><i class="fa fa-krw fa-fw"></i> 等级添加</a></li>
            </ul>
        </li>
        <li class="treeview @if(admin_nav_active('system')) active @endif">
            <a href="#">
                <i class="fa fa-connectdevelop fa-fw"></i>
                <span>设置</span>
                <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
            </a>
            <ul class="treeview-menu">
                <li class=""><a href="{{ route('system.basic') }}"  class="pjax-a"><i class="fa fa-apple fa-fw"></i> 系统设置</a></li>
                {{--<li class=""><a href="{{ route('admins.index') }}"  class="pjax-a"><i class="fa fa-apple fa-fw"></i> 用户管理</a></li>--}}
            </ul>
        </li>
        <li><a href="{{ route('comment.index') }}" class="pjax-a"><i class="fa fa-dashboard"></i> <span>评论管理</span></a></li>
    </ul>
</section>
