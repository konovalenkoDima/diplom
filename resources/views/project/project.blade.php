@extends('layouts.main')

@section('title')
    <title>Проекты</title>
@endsection

@section('links')
    <link href="{{ asset('css/project.css') }}" rel="stylesheet">
@endsection


@section('container')
        <div >
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Название проекта</th>
                        <th scope="col">Стоимость проекта</th>
                        <th scope="col">Список задач проекта</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($projectList as $project)

                    <tr>
                        <td>{{$project->name}}</td>
                        <td>{{$project->cost}} грн.</td>
                        <td>
                            <table class="table low-table">
                                @foreach($project->tasks as $task)
                                    <tr>
                                        <td>{{$task->name_task}}</td>
                                        <td><a class="btn" href="{{route('taskDetail', [$project->id, $task->id])}}">Подробности задачи</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection
