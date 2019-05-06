<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
    <script src="{{ asset('js/axios.min.js') }}?A1"></script>
</head>
<body style="background: #FFF; ">
<!-- conte-mid -->
<div class="container" id="id_main_conte">
    <nav class="navbar navbar-default">
        <a class="navbar-brand" href="{{ url('/tasks') }}">
            タスク一覧
        </a>
        <a class="navbar-brand" href="{{ url('/tasks/create') }}">
            新規作成
        </a>
    </nav>
    <p>[ base2 ]</p>
    <div id="app">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}?A1"></script>
</body>
</html>
