@extends('admin.layout.base')
@section('main-content')
    <div class="content">
        <div class="row">
            <form class="form-horizontal ajaxForm" action="{{ route('level.update',['level' => $level->id]) }}" method="post"  >
                {{ csrf_field() }}
                <div class="col-md-12">
                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-star text-orange"></i>
                            <h3 class="box-title">等级设置</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-2">等级：</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="请输入等级" name="level" type="text" value="{{ $level->level }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-2">分值：</label>
                                <div class="col-sm-4">
                                    <input class="form-control" placeholder="请输入分值" name="fen" type="text" value="{{ $level->fen }}">
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