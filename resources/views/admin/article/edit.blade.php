@extends('admin.layout.base')
@section('css')
    {!! editor_css() !!}
@endsection
@section('main-content')
    <div class="content">
        <div class="row">
            <form class="form-horizontal ajaxForm" action="{{ route('article.update',['article' => $article->id]) }}" method="post" >
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-8">
                    <!-- About Me Box -->
                    <div class="box-header with-border">
                        <i class="fa fa-star text-orange"></i>
                        <h3 class="box-title">新增新闻</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="请输入标题" value="{{ $article->title }}" name="title" type="text">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="请输入文章简介" value="{{ $article->description }}"  name="description" type="text">
                        </div>
                        <div class="form-group">
                            <div id="editormd_id">
                                <textarea name="markdown" style="display:none">{{ $article->markdown }}</textarea>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <!-- About Me Box -->
                    <div class="box-header with-border">
                        <i class="fa fa-star text-orange"></i>
                        <h3 class="box-title">拓展面板</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> 文章属性：  </label>
                            <div class="checkbox col-sm-8">
                                <label id="news_flag_c">
                                    <input class="ace ace-checkbox-2" name="type[]" value="r" type="checkbox"
                                    @if(strstr($article->type,'r') !== false)
                                        checked
                                     @endif
                                    >
                                    <span class="lbl"> 热门</span>
                                </label>
                                <label id="news_flag_c">
                                    <input class="ace ace-checkbox-2" name="type[]" value="t" type="checkbox"
                                           @if(strstr($article->type,'t') !== false)
                                           checked
                                            @endif
                                    >
                                    <span class="lbl"> 推荐</span>
                                </label>
                                <label id="news_flag_p">
                                    <input class="ace ace-checkbox-2" name="type[]" value="z" type="checkbox"
                                           @if(strstr($article->type,'z') !== false)
                                           checked
                                            @endif
                                    >
                                    <span class="lbl"> 置顶</span>
                                </label>
                                <label id="news_flag_d">
                                    <input class="ace ace-checkbox-2" name="type[]" value="y" type="checkbox"
                                           @if(strstr($article->type,'y') !== false)
                                           checked
                                            @endif
                                    >
                                    <span class="lbl"> 原创</span>
                                </label>
                                <label id="news_flag_e">
                                    <input class="ace ace-checkbox-2" name="type[]" value="c" type="checkbox"
                                           @if(strstr($article->type,'c') !== false)
                                           checked
                                            @endif
                                    >
                                    <span class="lbl"> 转载</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-2">所属分类：</label>
                            <div class="col-sm-8">
                                <select name="category_id" class="form-control col-sm-8" required >
                                    <option value="">--请选择--</option>
                                    @foreach($navs as $nav)
                                        <option value="{{ $nav->id }}"
                                                @if($article->category_id == $nav->id)
                                                selected
                                                @endif
                                        >{{ $nav->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-2">文章来源：</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="source" id="source"  value="{{ $article->source }}"  name="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1">作者：</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="author" value="{{ $article->author }}"  placeholder="转载文章必填，原创可留空" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1">关键字：</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="keywords" value="{{ $article->keywords }}"  placeholder="文章关键字,多个以逗号隔开" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1">排序：</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="sort"  value="{{ $article->sort }}"  type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1">阅读量：</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="click"  value="{{ $article->click }}"  type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="form-field-1">封面图：</label>
                            <div class="col-sm-8">
                                <div class="col-sm-12" id="upload">
                                    <a class="file">
                                        <input name="img" id="img_upload" type="hidden" value="{{ $article->img }}">
                                        <i class="fa fa-cloud-upload "></i>上传缩略图
                                    </a>
                                </div>
                                <div class="file_img_show col-sm-12">
                                    <div class="img col-xs-2" id="show_upload_img" style="margin-top:15px;">
                                        <i class="ace-icon fa fa-times  remove_upload_img"></i>
                                        <img src='{{ $article->img }}' alt="" class="upload-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
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
    </div>
@endsection
@section('script')
    {!! editor_js() !!}
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