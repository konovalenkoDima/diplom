@extends('layouts.main')

@section('links')
    <link href="{{ asset('css/edit-task.css') }}" rel="stylesheet">
@endsection

@section('container')
    @foreach($el as $e)
        <div class="add-task">
            <form class="form" method="get" action="{{ route('tasks.edit', $e->id) }}">
                @csrf
                <div class="form-group">
                    <input class="txtb" type="hidden" name="id" value="{{$e->id}}">
                    <input class="txtb" type="hidden" name="name_task" value="{{$e->name_task}}">
                    <h2>Название задания: {{$e->name_task}}</h2>
                </div>
                <div class="form-group">
                    <label for="time">Время выполнения</label>
                    <input class="txtb" type="number" name="time" value="{{$e->time}}">
                </div>
                    <h4>Требуемые навыки</h4>
                <div class="form-group">
                    <div class="group">
                        <label for="HTML">HTML</label><br>
                        <input class="txtb" type="number" name="HTML" value="{{$e->task_app->HTML}}">
                    </div>
                    <div class="group right">
                        <label for="CSS">CSS</label><br>
                        <input class="txtb" type="number" name="CSS" value="{{$e->task_app->CSS}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="group">
                        <label for="JS">JS</label>
                        <input class="txtb" type="number" name="JS" value="{{$e->task_app->JS}}">
                    </div>
                    <div class="group right" >
                        <label for="PHP">PHP</label><br>
                        <input class="txtb" type="number" name="PHP" value="{{$e->task_app->PHP}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="group">
                        <label for="MySQL">MySQL</label>
                        <input class="txtb" type="number" name="MySQL" value="{{$e->task_app->MySQL}}">
                    </div>
                    <div class="group right">
                        <label for="Laravel">Laravel</label><br>
                        <input class="txtb" type="number" name="Laravel" value="{{$e->task_app->Laravel}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="group">
                        <label for="MySQL">Дизайн</label>
                        <input class="txtb" type="number" name="Design" value="{{$e->task_app->Design}}">
                    </div>
                    <div class="group right">
                        <label for="Laravel">ОБД</label><br>
                        <input class="txtb" type="number" name="DataBase" value="{{$e->task_app->DataBase}}">
                    </div>
                </div>
                <input type="submit" class="add-btn">
            </form>
        </div>
        @break('foreach')
    @endforeach
@endsection
