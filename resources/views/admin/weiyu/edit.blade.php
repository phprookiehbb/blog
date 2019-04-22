@extends('admin.layout.base')
@section('css')
    {!! editor_css() !!}
@endsection
@section('main-content')
    <div class="content">
        <div class="row">
            <form class="form-horizontal ajaxForm" action="{{ route('weiyu.update',['weiyu' => $weiyu->id]) }}" method="post"  >
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-12">
                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-star text-orange"></i>
                            <h3 class="box-title">新增微语</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <div id="editormd_id">
                                    <textarea name="markdown" style="display:none">{{ $weiyu->markdown }}</textarea>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
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
@endsection