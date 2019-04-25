@extends('admin.layout.base')
@section('main-content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab">个人信息</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal ajaxForm" action="{{ route('admins.store') }}" method="post">
                                {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">用户名：</label>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="name"  autocomplete="off" value="" >
                                    </div>
                                    <div class="col-md-5 help-block"><i class="fa fa-info-circle color-info1"></i> 用户名只能包含字母、数字、下划线</div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">登录密码：</label>

                                    <div class="col-sm-4">
                                        <input type="password" class="form-control"  name="password" autocomplete="off" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">邮箱：</label>
                                    <div class="col-sm-4">
                                        <div class="input-group ">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input class="form-control"  name="email" value=""  autocomplete="off" placeholder="请输入邮箱" type="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">封面图：</label>
                                    <div class="col-sm-8">
                                        <div class="col-sm-12" id="upload">
                                            <a class="file">
                                                <input name="avatar" id="img_upload" type="hidden">
                                                <i class="fa fa-cloud-upload "></i>上传缩略图
                                            </a>
                                        </div>
                                        <div class="file_img_show col-sm-12">
                                            <div class="img col-xs-2" id="show_upload_img" style="margin-top:15px;">
                                                <i class="ace-icon fa fa-times  remove_upload_img"></i>
                                                <img src='' alt="" class="upload-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">个人简介：</label>
                                    <div class="col-sm-5">
                                        <textarea name="info" class="form-control" length="100" rows="5"></textarea>
                                        <p class="help-block"><i class="fa fa-info-circle color-info1"></i> 简单介绍一下自己吧</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
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
                            <!-- /.box-footer -->
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
@section('script')
    <script>
        layui.use('upload', function() {
            var $ = layui.jquery
                , upload = layui.upload;

            //普通图片上传
            var url = "{{ route('article.upload') }}"
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