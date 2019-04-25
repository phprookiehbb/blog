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
                                        <a title="添加" icon="fa fa-plus" class="btn btn-primary btn-sm" href="{{ route('admins.create') }}" primary-key="uid"><i class="fa fa-plus"></i> 添加</a>&nbsp;
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
                                    <th>用户名</th>
                                    <th>头像</th>
                                    <th>邮箱</th>
                                    <th>登录时间</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->id }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td><img src="{{ $admin->avatar }}" style="width:45px;height:45px;"></td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->created_at }}</td>
                                        <td>
                                            <a type="button" title="编辑"  href="{{ route('admins.edit',['admin' => $admin->id]) }}"  class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                            <form action="{{ route('admins.destroy',['admin' => $admin->id]) }}" method="post" style="display:inline-block">
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