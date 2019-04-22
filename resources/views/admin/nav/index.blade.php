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
                                    <a title="添加" icon="fa fa-plus" class="btn btn-primary btn-sm" href="{{ route('nav.create') }}" primary-key="uid"><i class="fa fa-plus"></i> 添加</a>&nbsp;
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
                                <th>导航名称</th>
                                <th>url</th>
                                <th>模板</th>
                                <th>状态</th>
                                <th>是否开启评论</th>
                                <th>排序</th>
                                <th>操作</th>
                            </tr>
                            @foreach($navs as $nav)
                                <tr>
                                    <td>{{ $nav->id }}</td>
                                    <td>{{ $nav->name }}</td>
                                    <td>{{ $nav->url }}</td>
                                    <td>{{ $nav->template }}</td>
                                    <td>
                                        <span class="label label-success label-status" data-id="{$vo.id}" data-status="{$vo.status}" data-href="{:url('admin/status')}" data-db="navbar">{{ $nav->navStatus }}</span>
                                    </td>
                                    <td>
                                        <span class="label label-success label-status" data-id="{$vo.id}" data-status="{$vo.status}" data-href="{:url('admin/status')}" data-db="navbar">{{ $nav->comment }}</span>
                                    </td>
                                    <td><input name="{$vo.id}" class="form-control" value="{{ $nav->sort }}" style="width:50px;" autocomplete="false" type="text"></td>
                                    <td>
                                        <a type="button" title="编辑"  href="{{ route('nav.edit',['nav' => $nav->id]) }}"  class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('nav.destroy',['nav' => $nav->id]) }}" method="post" style="display:inline-block">
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