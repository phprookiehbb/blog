@extends('admin.layout.base')
@section('css')
    {!! editor_css() !!}
    @endsection
@section('main-content')
    <div class="content">
    <div class="row">
        <form class="form-horizontal ajaxForm" action="{{ route('nav.store') }}" method="post" >
            {{ csrf_field() }}
            <div class="col-md-9">
                <!-- About Me Box -->
                <div class="box">
                    <div class="box-header with-border">
                        <i class="fa fa-star text-orange"></i>
                        <h3 class="box-title">新增新闻</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="请输入标题" name="name" type="text">
                        </div>
                        <div class="form-group">
                            <div id="editormd_id">
                                <textarea name="markdown" style="display:none;"></textarea>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">
                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-star text-orange"></i>
                        <h3 class="box-title">拓展面板</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">所属分类</label>
                            <select name="parent_id" class="form-control col-sm-8" >
                                <option value="0">--请选择--</option>
                                @foreach($navs as $nav)
                                <option value="{{ $nav->id }}">{{ $nav->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">url</label>
                            <input class="form-control" name="url" value="" type="text"  required>
                            <p class="help-block">
                                <i class="fa fa-info-circle color-info1">
                                </i>
                                为你的自定义页面设定一个专属的url
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">排序</label>
                            <input class="form-control" name="sort" value="10" type="text">
                            <p class="help-block">
                                <i class="fa fa-info-circle color-info1">
                                </i>
                                为你的自定义页面设定一个序列值以后, 能够使得它们按此值从小到大排列
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">自定义模板</label>
                            <select name="template" class="form-control col-sm-8" required >
                                <option value="">--请选择--</option>
                                @foreach($templates as $template)
                                <option value="{{ $template }}">{{ $template }}</option>
                                @endforeach
                            </select>
                            <p class="help-block">
                                <i class="fa fa-info-circle color-info1">
                                </i>
                                如果你为此页面选择了一个自定义模板, 系统将按照你选择的模板文件展现它
                            </p>
                        </div>
                        <div class="form-group">
                            <section class="typecho-post-option allow-option">
                                <label class="typecho-label">权限控制</label>
                                <ul>
                                    <li><input id="allowComment" name="is_comment" type="checkbox" value="1" checked="true">
                                        <label for="allowComment">允许评论</label></li>
                                    <li><input id="allowPing" name="status" type="checkbox" value="1" checked="true">
                                        <label for="allowPing">允许显示</label></li>
                                </ul>
                            </section>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="box-footer">
                <div class="col-md-offset-3 col-md-9 ">
                    <button class="btn btn-info btn-sm btn-radius" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        提交并保存
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <button class="btn btn-success btn-sm btn-radius" type="submit">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        重置
                    </button>
                </div>

            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.row -->
    </div>
@endsection
@section('script')
    {!! editor_js() !!}
@endsection