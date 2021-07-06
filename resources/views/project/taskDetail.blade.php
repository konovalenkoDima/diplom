@extends('layouts.main')

@section('links')
    <link href="{{ asset('css/project.css') }}" rel="stylesheet">
@endsection

@section('title')
    <title>Подробности задачи</title>
@endsection

@section('container')
    <div class="worker">
        <h1>Ответственный за задачу: {{$worker->surname}} {{$worker->name}} {{$worker->patronymic}}</h1>
        <h3>Даты выполнения задачи:</h3>
        <ul>
            @foreach($dateTask as $d)
                <li>{{$d->date}}</li>
            @endforeach
        </ul>
    </div>
@endsection
