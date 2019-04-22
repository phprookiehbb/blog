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
                                            <a title="添加" icon="fa fa-plus" class="btn btn-primary btn-sm" href="{{ route('article.create') }}" primary-key="uid"><i class="fa fa-plus"></i> 添加</a>&nbsp;
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding col-sm-12">
                                    <table class="table table-hover">
                                        <tr>
                                            <th class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace checkAll" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </th>
                                            <th>ID</th>
                                            <th>缩略图</th>
                                            <th>标题</th>
                                            <th>所属栏目</th>
                                            <th>属性</th>
                                            <th>状态</th>
                                            <th>排序</th>
                                            <th>添加时间</th>
                                            <th>操作</th>
                                        </tr>
                                        <tbody id="ajax-data">
                                        @foreach($articles as $article)
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" name="ids[]" value="{{ $article->id }}"/>
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>
                                            <td>{{ $article->id }}</td>
                                            <td><img src="{{ $article->article_img }}" style="width:120px;height:67px;"></td>
                                            <td>{{ $article->title }} 【{{ $article->article_author }}】</td>
                                            <td class="hidden-xs hidden-sm">
                                            {{ $article->nav->name }}
                                            <td>
                                                @if(strstr($article->type,'r') !== false)
                                                    <span class="label label-danger">热</span>
                                                @endif
                                                @if(strstr($article->type,'t') !== false)
                                                        <span class="label label-warning">推</span>
                                                @endif
                                                @if(strstr($article->type,'z') !== false)
                                                        <span class="label label-success">顶</span>
                                                @endif
                                                @if(strstr($article->type,'y') !== false)
                                                        <span class="label label-info">原</span>
                                                @endif
                                                @if(strstr($article->type,'c') !== false)
                                                    <span class="label label-orage">转</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="label label-success label-status" data-id="{$vo.id}" data-status="{$vo.status}" data-href="{:url('admin/status')}" data-db="news">{{ $article->articleStatus }}</span>
                                            </td>
                                            <td><input name="{$vo.id}" class="form-control" value="{{ $article->sort }}" style="width:50px;" autocomplete="false" type="text"></td>
                                            <td>{{ $article->created_at }}</td>
                                            <td>
                                                <a type="button" title="编辑" href="{{ route('article.edit',['article' => $article->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                                <form  style="display:inline-block" action="{{ route('article.destroy',['$article' => $article->id]) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" title="删除"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
@endsection