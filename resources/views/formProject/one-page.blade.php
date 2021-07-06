@extends('layouts.main')

@section('title')
    <title>Одностраничный сайт</title>
@endsection

@section('links')
    <link href="{{ asset('css/form_add.css') }}" rel="stylesheet">
@endsection

@section('container')

        @if($parameter=='lending')
            <h1>Укажите особенности проекта</h1>
            <div class="container">
            <form  action="{{route('one-page-project', ['type' => 'lending'])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="id">Код проекта:</label><br>
                    <input class="txtb" type="number" name="id" placeholder="Введите код проекта">
                </div>
                <div class="form-group">
                    <label for="name-project">Название:</label><br>
                    <input class="txtb" type="text" name="name" placeholder="Введите название проекта">
                </div>
                <div class="form-group">
                    <label for="design">Индивидуальный дизайн:</label><br>
                    <input type="radio" name="design" value="1"> Да;<br>
                    <input type="radio" name="design" value="0" checked> Нет;
                </div>
                <div class="form-group">
                    <label for="visit">Статистика посещения:</label><br>
                    <input type="radio" name="visit" value="1"> Да;<br>
                    <input type="radio" name="visit" value="0" checked> Нет;
                </div>
                <div class="form-group">
                    <label for="widget">Количество виджитов:</label><br>
                    <input type="number"  class="txtb" name="widget" placeholder="Введите количество виджетов">
                </div>
                <div class="form-group">
                    <label for="">Количество внешних платформ:</label><br>
                    <input type="number" name="api" class="txtb" placeholder="Введите количество API">
                </div>
                <div class="form-group">
                    <label for="mail">Сервисы отправки сообщений</label><br>
                    <input type="number" class="txtb" name="mail" placeholder="Введите количество платформ для отправки сообщений">
                </div>
                <div class="form-group">
                    <label for="domain">Наличие доменного имени:</label><br>
                    <input type="radio" name="domain" value="1"> Да;<br>
                    <input type="radio" name="domain" value="0" checked> Нет;
                </div>
                <div class="form-group">
                    <label for="hosting">Наличие хостинга:</label><br>
                    <input type="radio" name="hosting" value="1"> Да;<br>
                    <input type="radio" name="hosting" value="0" checked> Нет;
                </div>
                <input type="submit" class="add-btn">
            </form>
            </div>
        @else
            <h1>Укажите особенности проекта</h1>
            <div class="container">
                <form  action="{{route('one-page-project', ['type' => 'visit'])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id">Код проекта:</label><br>
                        <input class="txtb" type="number" name="id" placeholder="Введите код проекта">
                    </div>
                    <div class="form-group">
                        <label for="name-project">Название:</label><br>
                        <input class="txtb" type="text" name="name" placeholder="Введите название проекта">
                    </div>
                    <div class="form-group">
                        <label for="design">Индивидуальный дизайн:</label><br>
                        <input type="radio" name="design" value="1"> Да;<br>
                        <input type="radio" name="design" value="0" checked> Нет;
                    </div>
                    <div class="form-group">
                        <label for="visit">Статистика посещения:</label><br>
                        <input type="radio" name="visit" value="1"> Да;<br>
                        <input type="radio" name="visit" value="0" checked> Нет;
                    </div>
                    <div class="form-group">
                        <label for="widget">Количество виджитов:</label><br>
                        <input type="number"  class="txtb" name="widget" placeholder="Введите количество виджетов">
                    </div>
                    <div class="form-group">
                        <label for="">Количество внешних платформ:</label><br>
                        <input type="number" name="api" class="txtb" placeholder="Введите количество API">
                    </div>
                    <div class="form-group">
                        <label for="mail">Сервисы отправки сообщений</label><br>
                        <input type="number" class="txtb" name="mail" placeholder="Введите количество платформ для отправки сообщений">
                    </div>
                    <div class="form-group">
                        <label for="domain">Наличие доменного имени:</label><br>
                        <input type="radio" name="domain" value="1"> Да;<br>
                        <input type="radio" name="domain" value="0" checked> Нет;
                    </div>
                    <div class="form-group">
                        <label for="hosting">Наличие хостинга:</label><br>
                        <input type="radio" name="hosting" value="1"> Да;<br>
                        <input type="radio" name="hosting" value="0" checked> Нет;
                    </div>
                    <input type="submit" class="add-btn">
                </form>
            </div>
        @endif

@endsection
