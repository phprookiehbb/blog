@extends('admin.layout.base')
@section('main-content')
    <div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default panel-intro">
                <div class="panel-body">
                    <div class="box-header">
                        <div class="fixed-table-toolbar">
                                <ul class="nav nav-tabs">
                                    <li  class="active">
                                        <a href="{{ route('comment.index') }}">
                                            一级评论
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('comment.second') }}">
                                            二级回复
                                        </a>
                                    </li>

                                </ul>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th>用户名</th>
                                <th>邮箱</th>
                                <th>所属栏目</th>
                                <th>内容</th>
                                <th>状态</th>
                                <th>添加时间</th>
                                <th>操作</th>
                            </tr>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{ $comment->user->email }}</td>
                                    <td>{{ $comment->nav->name }}</td>
                                    <td>
                                        {!! $comment->content !!}
                                    </td>
                                    <td>
                                        @switch($comment->status)
                                            @case(1)
                                            <span class="label label-success" style="cursor:pointer">已审核</span>
                                            @break
                                            @default
                                            <span class="label label-danger comment-check" style="cursor:pointer" data-id="{{ $comment->id }}" data-href="{{ route('comment.check') }}" data-type="1">未审核</span>
                                        @endswitch
                                    </td>
                                    <td>{{ $comment->created_at }}</td>
                                    <td>

                                        <form action="{{ route('comment.delete',['comment' => $comment->id]) }}" method="post" style="display:inline-block">
                                            {{ csrf_field() }}
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
        <!-- /.col -->
    </div>
    </div>
@endsection