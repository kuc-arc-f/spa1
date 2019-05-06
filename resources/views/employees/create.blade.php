
@extends('layouts.base')
@section('title', '新規作成')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            新規作成
        </div>
		@if (count($errors) > 0)
			<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
			    <li>{{ $error }}</li>
			@endforeach
			</ul>
			</div>
		@endif
        <div class="panel-body">
            {!! Form::model($employee, ['route' => 'employees.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('dept_id', 'dept_id', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('dept_id', $employee->dept_id, ['id' => 'dept_id-name', 'class' => 'form-control']) !!}
                    </div>
                </div>

	                <div class="form-group">
                    {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('name', $employee->name, ['id' => 'employee-name', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        {!! Form::submit('タスク追加', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
        <div class="panel-footer">
            {{ link_to_route('employees.index', '戻る') }}
        </div>
    </div>

@endsection
