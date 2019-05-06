@extends('layouts.base')

@section('title', 'タスク一覧')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            タスク一覧
        </div>
        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>タスク名</th>
                    <!--
                    <th>完了</th>
                        -->
                    <th>Dept</th>
                    <th>編集</th>
                    <th>削除</th>
                </thead>
                <tbody>
                    @foreach ($employees as $employee )
                        <tr>
                            <td class="table-text">
                                {{ link_to_route('employees.show', $employee->name, $employee->id) }}
                            </td>
                            <td class="table-text">
                                <?php $dept  = $employee->dept; ?>
                                {{ $dept->name }}
                            </td>
                            <td class="table-text">
                                {{ link_to_route('employees.edit', '編集', $employee->id, ['class' => 'btn btn-sm btn-default']) }}
                            </td>
                            <td class="table-text">
                                {{ Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete']) }}
                                    {{ Form::hidden('id', $employee->id) }}
                                    {{ Form::submit('削除', ['class' => 'btn btn-sm btn-default']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br />
            new:<br />
            {{ link_to_route('employees.create', '[ create ]' ) }}
            <br />
            <br />
            <a href="make/"  class="btn btn-primary ">詳細はこちら </a>
        </div>
    </div>

@endsection
