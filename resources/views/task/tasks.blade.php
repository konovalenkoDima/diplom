@extends('layouts.main')

@section('links')
    <script src="{{ asset('js/show-hide-form.js') }}" ></script>
    <script src="{{ asset('js/accordion.js') }}" ></script>
    <link href="{{ asset('css/form_add.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aside.css') }}" rel="stylesheet">
    <link href="{{ asset('css/worker.css') }}" rel="stylesheet">
@endsection
@section('container')
<div class="main">
    <h1>Задачи</h1>
    <div class="worker">
        @foreach($data as $el)
            <div>
                <div class="accordion">{{$el->name_task}}</div>
                <div class="panel">
                    <div class="inf-cont">
                        <p>Порядок выполнения: {{$el->index}}</p>
                        <p>Время выполнения: {{$el->time}}</p>
                    </div>
                    <table class="table-appraisals">
                        <tr>
                            <td>HTML</td>
                            <td>CSS</td>
                            <td>JS</td>
                            <td>PHP</td>
                            <td>MySql</td>
                            <td>Laravel</td>
                            <td>Дизайн</td>
                            <td>ОБД</td>
                        </tr>
                        <tr>
                            <td>{{$el->task_app->HTML}}</td>
                            <td>{{$el->task_app->CSS}}</td>
                            <td>{{$el->task_app->JS}}</td>
                            <td>{{$el->task_app->PHP}}</td>
                            <td>{{$el->task_app->MySQL}}</td>
                            <td>{{$el->task_app->Laravel}}</td>
                            <td>{{$el->task_app->Design}}</td>
                            <td>{{$el->task_app->DataBase}}</td>
                        </tr>
                    </table>
                    <div class="control">
                        <form class="form-control" action="{{route('tasks.show', $el->id)}}" method="get">
                            @csrf
                            <button name="submit" class="edit">Редактировать</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
