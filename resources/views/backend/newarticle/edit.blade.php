@extends('backend.app')

@section('modules')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">编辑文章</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>编辑失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <form action="{{ url('backend/article/'.$article->id) }}" method="POST">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <a>选择文章类别&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        <select name='category',class="form-control">
                            @foreach($navList as $nav)
                                <option>{{$nav->name}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题" value='{{$article->title}}'>
                        <br>
                        <div class='editor'>
                        @include('editor::head')
                            {!! Form::textarea('content', $article->content, ['class' => 'form-control','id'=>'myEditor']) !!}
                        </div>
                        <button class="btn btn-lg btn-info">编辑文章</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@include('editor::decode')
@endsection