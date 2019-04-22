@include('admin.layout.header')
@yield('css')
<div class="wrapper" id="pjax-content" >

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>B</b>LOG</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>HB</b>BLOG</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        @include('admin.layout.top')
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        @include('admin.layout.aside');
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!--  <h1>
               Dashboard
               <small>Control panel</small>
             </h1> -->
            <ol class="breadcrumb" style="left:15px;">
                <li><a href="{{ route('home.index') }}"><i class="fa fa-dashboard"></i> 首页</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style="margin-top:30px;">
            @yield('main-content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2017-2018 <a href="http://crasphter.cn">crasphb彬</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('admin.layout.script')
@yield('script')
</body>
</html>
