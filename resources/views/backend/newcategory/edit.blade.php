@extends('backend.app')

@section('modules')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">编辑类别</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('backend/category/'.$category->id) }}" method="POST">
                    {{ method_field('PATCH') }}
                        {!! csrf_field() !!}
                        <input type="text" name="name" class="form-control" required="required" placeholder="请输入类别" value='{{$category->name}}'>
                        <br>
                        <button class="btn btn-lg btn-info">编辑类别</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection