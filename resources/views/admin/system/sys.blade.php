@extends('admin.layout.base')
@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body box-profile">
                    <div class="">
                        <ul class="nav nav-tabs">
                            <li class="">
                                <a href="{{ route('system.basic') }}">
                                    基本
                                </a>
                            </li>
                            <li class="active">
                                <a href="{{ route('system.sys') }}">
                                    系统
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
                                                是否开启评论：
                                            </label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="web_comment">
                                                    <option value="1"
                                                    @if(get_config('web_comment') == 1)
                                                        selected
                                                    @endif
                                                    >
                                                    开启
                                                    </option>
                                                    <option value="0"
                                                    @if(!get_config('web_comment'))
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
                                                站点关闭后将提示网站已关闭，不能正常访问，配置名：
                                                <code>
                                                    web_comment
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                默认作者：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="web_author" type="text" value="{{ get_config('web_author') }}" placeholder="文章默认作者" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                文章保留版权提示：
                                            </label>
                                            <div class="col-md-6">
                                                <textarea class="form-control" length="120" name="web_article_copyright" rows="5">{{ get_config('web_article_copyright') }}</textarea>
                                                <p class="help-block">
                                                    <i class="fa fa-info-circle color-info1">
                                                    </i>
                                                    用于文章底部显示的版权信息，配置名：
                                                    <code>
                                                        web_article_copyright
                                                    </code>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                分页页数：
                                            </label>
                                            <div class="col-md-4">
                                                <input class="form-control" name="web_paginate" type="text" value="{{ get_config('web_paginate') }}" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                是否开启打赏：
                                            </label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="web_reward">
                                                    <option value="1"
                                                    @if(get_config('web_reward') == 1)
                                                        selected
                                                    @endif>
                                                    开启
                                                    </option>
                                                    <option value="0"
                                                    @if(!get_config('web_reward'))
                                                        selected
                                                    @endif>
                                                    关闭
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 help-block">
                                                <i class="fa fa-info-circle color-info1">
                                                </i>
                                                站点关闭后将提示网站已关闭，不能正常访问，配置名：
                                                <code>
                                                    web_reward
                                                </code>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1">打赏图：</label>
                                            <div class="col-sm-2">
                                                <div class="col-sm-12" id="upload">
                                                    <button href="javascript:;" class="file" >
                                                        <input name="web_alipay" id="img_upload" type="hidden" value="{{ get_config('web_alipay') }}">
                                                        <i class="fa fa-cloud-upload "></i>支付宝打赏图
                                                    </button>
                                                </div>
                                                <div class="file_img_show col-sm-12">
                                                    <div class="img col-xs-2" id="show_upload_img" style="margin-top:15px;">
                                                        <i class="ace-icon fa fa-times  remove_upload_img"></i>
                                                        <img src="{{ get_config('web_alipay') }}" alt="" class="upload-img">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="col-sm-12" id="upload2">
                                                    <button href="javascript:;" class="file" >
                                                        <input name="web_wepay" id="img_upload2" type="hidden" value="{{ get_config('web_wepay') }}">
                                                        <i class="fa fa-cloud-upload "></i>微信打赏图
                                                    </button>
                                                </div>
                                                <div class="file_img_show col-sm-12">
                                                    <div class="img col-xs-2" id="show_upload_img2" style="margin-top:15px;">
                                                        <i class="ace-icon fa fa-times  remove_upload_img"></i>
                                                        <img src="{{ get_config('web_wepay') }}" alt="" class="upload-img2">
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
            var uploadInst = upload.render({
                elem: '#upload2'
                , url: url
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('.upload-img2').attr('src', result); //图片链接（base64）
                    });
                }
                , done: function (res) {
                    //如果上传失败
                    if (res.code > 0) {
                        return layer.msg('上传失败');
                    }
                    $('.upload-img2').attr('src', res.result); //图片链接（base64）
                    $('#img_upload2').val(res.result); //图片链接（base64）
                    //上传成功
                }
            });
        });
    </script>
@endsection