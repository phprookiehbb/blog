@extends('admin.layout.base')
@section('main-content')
    <div class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default panel-intro">
                    <div class="panel-body">
                        <div class="box-header">
                            <div class="fixed-table-toolbar">
                                <div class="bs-bars pull-left">
                                    <div id="builder-toolbar" class="toolbar">
                                        <a title="添加" icon="fa fa-plus" class="btn btn-primary btn-sm" href="{{ route('level.create') }}" primary-key="uid"><i class="fa fa-plus"></i> 添加</a>&nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>等级</th>
                                    <th>分值</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($levels as $level)
                                    <tr>
                                        <td>{{ $level->id }}</td>
                                        <td>{{ $level->level }}</td>
                                        <td>{{ $level->fen }}</td>
                                        <td>
                                            <a type="button" title="编辑"  href="{{ route('level.edit',['level' => $level->id]) }}"  class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                            <form action="{{ route('level.destroy',['level' => $level->id]) }}" method="post" style="display:inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection