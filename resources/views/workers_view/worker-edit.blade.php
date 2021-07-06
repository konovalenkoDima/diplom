@extends('layouts.main')

@section('links')
    <link href="{{ asset('css/edit.css') }}" rel="stylesheet">
@endsection

@section('container')
    @foreach($data as $element)
        <h3 style="margin-left: 20px">Работник: {{$element->worker->name}} {{$element->worker->surname}}</h3>
        @break('foreach')
    @endforeach
    @foreach($el as $e)
        <div style="position: absolute;top: 150px; width: 600px; left: 30px">
    <form method="get" action="{{route('worker.edit', $e->id)}}">
        @csrf

        <div class="form-group">
            <div class="group">
                <label for="name">Имя</label>
                <input class="txtb" type="text"  value="{{$e->name}}" name="name">
            </div>
            <div class="group right">
                <label for="surname">Фамилия</label>
                <input class="txtb" type="text"  value="{{$e->surname}}" name="surname">
            </div>
            <input class="txtb" type="hidden" value="{{$e->id}}" name="id">
        </div>
        <div class="form-group">
            <div class="group">
                <label for="partonymic">Отчество</label>
                <input class="txtb" type="text" value="{{$e->patronymic}}" name="patronymic">
            </div>
            <div class="group right">
                <label for="position">Должность</label>
                <input class="txtb" type="text" value="{{$e->position}}" name="position">
            </div>
        </div>
        <div class="form-group birthday group">
            <label for="birthday">Дата рождения</label>
            <input class="txtb " type="date" name="birthday" value="{{$e->birthday}}" >
        </div>
        <div class="form-group">
            <div class="group">
                <label for="HTML">HTML</label>
                <input class="txtb" type="number" value="{{$e->Appraisals->HTML}}" name="HTML">
            </div>
            <div class="group right">
                <label for="CSS">CSS</label>
                <input class="txtb" type="number" value="{{$e->Appraisals->CSS}}"  name="CSS">
            </div>
        </div>
        <div class="form-group">
            <div class="group">
                <label for="JS">JS</label>
                <input class="txtb" type="number" value="{{$e->Appraisals->JS}}" name="JS">
            </div>
            <div class="group right">
                <label for="PHP">PHP</label>
                <input class="txtb" type="number" value="{{$e->Appraisals->PHP}}" name="PHP">
            </div>
        </div>
        <div class="form-group">
            <div class="group">
                <label for="MySQL">MqSQL</label>
                <input class="txtb" type="number" value="{{$e->Appraisals->MySQL}}" name="MySQL">
            </div>
            <div class="group right">
                <label for="Laravel">Laravel</label>
                <input class="txtb" type="number" value="{{$e->Appraisals->Laravel}}" name="Laravel">
            </div>
        </div>
        <div class="form-group">
            <div class="group">
                <label for="Design">Дизайн</label>
                <input class="txtb" type="number" value="{{$e->Appraisals->Design}}" name="Design">
            </div>
            <div class="group right">
                <label for="DataBase">ОБД</label>
                <input class="txtb" type="number" value="{{$e->Appraisals->DataBase}}" name="DataBase">
            </div>
        </div>
        <input type="submit" class="add-btn">
    </form>
    @endforeach
    </div>
    <div style="position: absolute; top: 150px; left: 680px">
    @foreach($data as $el)

            <form action="{{route('update-cost', $el->task_id)}}" method="post">
                @csrf
                <div class="form-group cost">
                    <label for="cost">{{$el->task->name_task}}:</label><br>
                    <input type="hidden" name="id" value="{{$el->worker_id}}">
                    <input class="txtb" type="text" name="cost" value="{{$el->cost}}">
                    <input type="submit" class="add-btn" value="Редактировать">
                </div>


            </form>


    @endforeach
    </div>
@endsection
