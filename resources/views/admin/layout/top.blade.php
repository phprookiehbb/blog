<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ \Auth::guard('admin')->user()->avatar }}" class="user-image" alt="">
                    <span class="hidden-xs">{{ \Auth::guard('admin')->user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ \Auth::guard('admin')->user()->avatar }}" class="img-circle" alt="">

                        <p>
                            {{ \Auth::guard('admin')->user()->name }}
                            <small>登录时间：{{ \Auth::guard('admin')->user()->login_time }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{ route('admins.edit',['admin' => \Auth::guard('admin')->id()]) }}" class="btn btn-default btn-flat">个人主页</a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('login.logout') }}" class="btn btn-default btn-flat">退出登录</a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
                <a href="{{ route('home.index') }}" target="_blank"  title="前台首页"><i class="fa fa-desktop"></i></a>
            </li>
        </ul>
    </div>
</nav>
