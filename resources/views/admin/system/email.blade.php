@extends('admin.layout.base')
@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body box-profile">
                    <div class="">
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="{{ route('system.basic') }}">
                                    基本
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ route('system.sys') }}">
                                    系统
                                </a>
                            </li>
                            <li  class="active">
                                <a href="{{ route('system.email') }}">
                                    邮件
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="box-body">
                    <div class="builder formbuilder-box">
                        <div class="row">
                            <div class="col-md-11" style="padding: 20px;margin-left:30px;border-radius:3px;">
                                <form action="{{ route('system.store') }}" class="ajaxForm form-horizontal" method="post">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                邮箱服务器类型：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail.driver" type="text" value="{{ get_config('mail.driver') }}" placeholder="邮箱服务器类型" />
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置显示的网站的标题，配置名：
                                                <code>
                                                    mail.driver
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                加密方式：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail.encryption" type="text" value="{{ get_config('mail.encryption') }}" placeholder="加密方式" />
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置加密方式，配置名：
                                                <code>
                                                    mail.encryption
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                邮箱服务器端口：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail.port" type="text" value="{{ get_config('mail.port') }}" placeholder="邮箱服务器端口" />
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置邮箱服务器端口，配置名：
                                                <code>
                                                    mail.port
                                                </code>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                邮箱服务器地址：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail.host" type="text" value="{{ get_config('mail.host') }}" placeholder="邮箱服务器地址"/>
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置邮箱服务器地址，配置名：
                                                <code>
                                                    mail.host
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                邮箱账号：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail.username" type="text" value="{{ get_config('mail.username') }}" placeholder=""/>
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置邮箱账号，配置名：
                                                <code>
                                                    mail.username
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                邮箱密码：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail.password" type="text" value="{{ get_config('mail.password') }}" placeholder=""/>
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置邮箱密码，配置名：
                                                <code>
                                                    mail.password
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                发件人名称：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail.from_name" type="text" value="{{ get_config('mail.from_name') }}" placeholder=""/>
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置发件人名称，配置名：
                                                <code>
                                                    mail.from_name
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                发件人邮箱：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail.from_address" type="text" value="{{ get_config('mail.from_address') }}" placeholder=""/>
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置发件人邮箱，配置名：
                                                <code>
                                                    mail.from_address
                                                </code>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="box-footer">
                                            <div class="col-md-offset-3 col-md-9 ">
                                                <button class="btn btn-info btn-sm btn-radius" type="submit">
                                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                                    提交并保存
                                                </button>

                                                &nbsp; &nbsp; &nbsp;
                                                <button class="btn btn-success btn-sm btn-radius" type="reset">
                                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                                    重置
                                                </button>
                                            </div>

                                        </div>
                                        </hr>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
@endsection
