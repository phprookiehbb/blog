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
                                        <a title="添加" icon="fa fa-plus" class="btn btn-primary btn-sm" href="{{ route('weiyu.create') }}" primary-key="uid"><i class="fa fa-plus"></i> 添加</a>&nbsp;
                                        <a title="排序" icon="fa fa-plus" class="btn btn-success btn-sm ajaxsort"  primary-key="uid"><i class="fa fa-plus"></i> 排序</a>&nbsp;
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
                                    <th>内容</th>
                                    <th>状态</th>
                                    <th>时间</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($weiyus as $weiyu)
                                    <tr>
                                        <td>{{ $weiyu->id }}</td>
                                        <td>{!! $weiyu->content !!}</td>
                                        <td>
                                            @switch($weiyu->status)
                                                @case(1)
                                                <span class="label label-success">已审核</span>
                                                @break
                                                @default
                                                <span class="label label-danger">未审核</span>
                                            @endswitch
                                        </td>
                                        <td>{{ $weiyu->created_at }}</td>
                                        <td>
                                            <a type="button" title="编辑"  href="{{ route('weiyu.edit',['weiyu' => $weiyu->id]) }}"  class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                            <form action="{{ route('weiyu.destroy',['weiyu' => $weiyu->id]) }}" method="post" style="display:inline-block">
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