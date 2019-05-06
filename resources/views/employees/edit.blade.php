@extends('layouts.base')

@section('title', "$book->nameの編集")

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $book->title }}の編集
        </div>
        <div class="panel-body">
            {!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'タスク名', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('title', $book->title, ['id' => 'book-title', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        {!! Form::button('<i class="fa fa-save"></i> 保存', ['type' => 'submit', 'class' => 'btn btn-default']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
        <div class="panel-footer">
            {{ link_to_route('books.index', '戻る') }}
        </div>
    </div>

@endsection
