@extends('layouts.base')

@section('title', $book->title )

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $book->title }}
        </div>
        <div class="panel-body">
            <div>
                Title: {{ $book->title }}
            </div>
        </div>
        <div class="panel-footer">
            {{ link_to_route('books.index', '戻る') }}
        </div>
    </div>

@endsection
