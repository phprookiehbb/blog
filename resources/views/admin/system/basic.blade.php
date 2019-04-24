@extends('admin.layout.base')
@section('main-content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body box-profile">
                <div class="">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="{{ route('system.basic') }}">
                                基本
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('system.sys') }}">
                                系统
                            </a>
                        </li>
                        <li>
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
                                            网站名称：
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="web_name" type="text" value="{{ get_config('web_name') }}" placeholder="网站的标题名称" />
                                        </div>
                                        <div class="col-md-5 help-block">
                                            <i class="fa fa-info-circle color-info1">
                                            </i>
                                            设置显示的网站的标题，配置名：
                                            <code>
                                                web_name
                                            </code>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">
                                            网站关键字：
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="web_keywords" type="text" value="{{ get_config('web_keywords') }}" placeholder="网站关键字" />
                                        </div>
                                        <div class="col-md-5 help-block">
                                            <i class="fa fa-info-circle color-info1">
                                            </i>
                                            设置网站关键字，配置名：
                                            <code>
                                                web_keywords
                                            </code>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">
                                            网站描述：
                                        </label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" length="120" name="web_description" rows="5">{{ get_config('web_description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">
                                            版权信息：
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="web_copyright" type="text" value="{{ get_config('web_copyright') }}" placeholder="Copyright © ******有限公司 All rights reserved."/>
                                        </div>
                                        <div class="col-md-5 help-block">
                                            <i class="fa fa-info-circle color-info1">
                                            </i>
                                            设置在网站底部显示的版权信息，配置名：
                                            <code>
                                                web_copyright
                                            </code>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">
                                            备案号：
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="web_record" type="text" value="{{ get_config('web_record') }}" placeholder="豫ICP备*******号-1"/>
                                        </div>
                                        <div class="col-md-5 help-block">
                                            <i class="fa fa-info-circle color-info1">
                                            </i>
                                            设置在网站底部显示的备案信息，配置名：
                                            <code>
                                                web_record
                                            </code>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">
                                            github地址：
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="web_github" type="text" value="{{ get_config('web_github') }}" placeholder=""/>
                                        </div>
                                        <div class="col-md-5 help-block">
                                            <i class="fa fa-info-circle color-info1">
                                            </i>
                                            设置在网站底部显示的github的地址链接，配置名：
                                            <code>
                                                web_github
                                            </code>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">
                                            站点统计：
                                        </label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" length="120" name="site_statistics" rows="5">{{ get_config('site_statistics') }}</textarea>
                                            <p class="help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                支持百度、Google、cnzz等所有Javascript的统计代码，配置名：
                                                <code>
                                                    site_statistics
                                                </code>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">网站logo：</label>
                                        <div class="col-sm-2">
                                            <div class="col-sm-12" id="upload">
                                                <button href="javascript:;" class="file" >
                                                    <input name="web_logo" id="img_upload" type="hidden" value="{{ get_config('web_logo') }}">
                                                    <i class="fa fa-cloud-upload "></i>上传logo图
                                                </button>
                                            </div>
                                            <div class="file_img_show col-sm-12">
                                                <div class="img col-xs-2" id="show_upload_img" style="margin-top:15px;">
                                                    <i class="ace-icon fa fa-times  remove_upload_img"></i>
                                                    <img src='{{ get_config('web_logo') }}' alt="" class="upload-img">
                                                </div>
                                            </div>
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
@section('script')
    <script>
        layui.use('upload', function() {
            var $ = layui.jquery
                , upload = layui.upload;

            //普通图片上传
            var url = "{{ route('system.upload') }}"
            var uploadInst = upload.render({
                elem: '#upload'
                , url: url
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('.upload-img').attr('src', result); //图片链接（base64）
                    });
                }
                , done: function (res) {
                    //如果上传失败
                    if (res.code > 0) {
                        return layer.msg('上传失败');
                    }
                    $('.upload-img').attr('src', res.result); //图片链接（base64）
                    $('#img_upload').val(res.result); //图片链接（base64）
                    //上传成功
                }
            });
        });
    </script>
@endsection