@extends('backend.app')

@section('modules')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新增一篇文章</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <form action="{{ url('backend/article') }}" method="POST">
                    <a>选择文章类别&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        <select name='category',class="form-control">
                            @foreach($navList as $nav)
                                <option>{{$nav->name}}</option>
                            @endforeach
                        </select>
                        <br><br>
                    
                        {!! csrf_field() !!}
                        <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题">
                        <br>
                        <div class='editor'>
                        @include('editor::head')
                            {!! Form::textarea('content', '', ['class' => 'form-control','id'=>'myEditor']) !!}
                        </div>
                        <button class="btn btn-lg btn-info">新增文章</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection