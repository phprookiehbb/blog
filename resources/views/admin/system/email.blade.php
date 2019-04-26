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
                                                后台入口：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="web_admin" type="text" value="{{ get_config('web_admin') }}" placeholder="网站的后台入口名称" />
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置显示的网站的标题，配置名：
                                                <code>
                                                    web_admin
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                是否开启邮件通知：
                                            </label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="mail_notice">
                                                    <option value="1"
                                                            @if(get_config('mail_notice') == 1)
                                                            selected
                                                            @endif
                                                    >
                                                        开启
                                                    </option>
                                                    <option value="0"
                                                            @if(!get_config('mail_notice'))
                                                            selected
                                                            @endif
                                                    >
                                                        关闭
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                开启邮件通知，评论会抽到相应的邮件消息，配置名：
                                                <code>
                                                    mail_notice
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                邮箱服务器类型：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail_driver" type="text" value="{{ get_config('mail_driver') }}" placeholder="邮箱服务器类型" />
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置显示的网站的标题，配置名：
                                                <code>
                                                    mail_driver
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                加密方式：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail_encryption" type="text" value="{{ get_config('mail_encryption') }}" placeholder="加密方式" />
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置加密方式，配置名：
                                                <code>
                                                    mail_encryption
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                邮箱服务器端口：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail_port" type="text" value="{{ get_config('mail_port') }}" placeholder="邮箱服务器端口" />
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置邮箱服务器端口，配置名：
                                                <code>
                                                    mail_port
                                                </code>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                邮箱服务器地址：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail_host" type="text" value="{{ get_config('mail_host') }}" placeholder="邮箱服务器地址"/>
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置邮箱服务器地址，配置名：
                                                <code>
                                                    mail_host
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                邮箱账号：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail_username" type="text" value="{{ get_config('mail_username') }}" placeholder=""/>
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置邮箱账号，配置名：
                                                <code>
                                                    mail_username
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                邮箱密码：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail_password" type="text" value="{{ get_config('mail_password') }}" placeholder=""/>
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置邮箱密码，配置名：
                                                <code>
                                                    mail_password
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                发件人名称：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail_from_name" type="text" value="{{ get_config('mail_from_name') }}" placeholder=""/>
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置发件人名称，配置名：
                                                <code>
                                                    mail_from_name
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                发件人邮箱：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="mail_from_address" type="text" value="{{ get_config('mail_from_address') }}" placeholder=""/>
                                            </div>
                                            <div class="col-md-5 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                设置发件人邮箱，配置名：
                                                <code>
                                                    mail_from_address
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
