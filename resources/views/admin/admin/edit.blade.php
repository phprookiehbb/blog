@extends('admin.layout.base')
@section('main-content')
    <div class="content">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ $admin->avatar }}" alt="">

                        <h3 class="profile-username text-center">{{ $admin->name }}</h3>


                        <li class="user-body" style="padding:10px 0px;">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <div>登录时间</div>
                                    <div>{{ $admin->login_time }}</div>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <div>登录次数</div>
                                    <div>{{ $admin->times }}</div>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <div>登录ip</div>
                                    <div>{{ $admin->login_ip }}</div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">关于我</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> 登录ip</strong>

                        <p class="text-muted">
                            {{ $admin->login_ip }}
                        </p>

                        <hr>
                        <strong><i class="fa fa-book margin-r-5"></i> 登录时间</strong>

                        <p class="text-muted">
                            {{ $admin->login_time }}
                        </p>


                        <hr>
                        <strong><i class="fa fa-map-marker margin-r-5"></i> 邮箱</strong>

                        <p class="text-muted">{{ $admin->email }}</p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> 个人简介</strong>

                        <p>{{ $admin->info }}</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab">个人信息</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal ajaxForm" action="{{ route('admins.update',['admin' => $admin->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">用户名：</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="name"  autocomplete="off" value="{{ $admin->name }}" >
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
                                            <input class="form-control"  name="email" value="{{ $admin->email }}"  autocomplete="off" placeholder="请输入邮箱" type="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">封面图：</label>
                                    <div class="col-sm-8">
                                        <div class="col-sm-12" id="upload">
                                            <a class="file">
                                                <input name="avatar" id="img_upload" type="hidden" value="{{ $admin->avatar }}">
                                                <i class="fa fa-cloud-upload "></i>上传缩略图
                                            </a>
                                        </div>
                                        <div class="file_img_show col-sm-12">
                                            <div class="img col-xs-2" id="show_upload_img" style="margin-top:15px;">
                                                <i class="ace-icon fa fa-times  remove_upload_img"></i>
                                                <img src='{{ $admin->avatar }}' alt="" class="upload-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">个人简介：</label>
                                    <div class="col-sm-5">
                                        <textarea name="info" class="form-control" length="100" rows="5">{{ $admin->info }}</textarea>
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