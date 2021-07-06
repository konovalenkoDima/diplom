@extends('layouts.main')

@section('title')
    <title>Многостраничный сайт</title>
@endsection

@section('links')
    <link href="{{ asset('css/form_add.css') }}" rel="stylesheet">
@endsection

@section('container')

    @switch($parameter)
        @case('coop')
        <h1>Укажите особенности проекта</h1>
        <div class="container">
            <form  action="{{route('poly-page-project', ['type' => 'Coop'])}}" method="post">
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
                    <label for="pages">Количество страниц:</label><br>
                    <input type="number"  class="txtb" name="pages" placeholder="Введите количество страниц">
                </div>
                <div class="form-group">
                    <label for="design">Индивидуальный дизайн:</label><br>
                    <input type="radio" name="design" value="1"> Да;<br>
                    <input type="radio" name="design" value="0" checked> Нет;
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
                    <label for="chat">Наличие системы чатов:</label><br>
                    <input type="radio" name="chat" value="1"> Да;<br>
                    <input type="radio" name="chat" value="0" checked> Нет;
                </div>
                <div class="form-group">
                    <label for="editProfile">Редактирование профиля:</label><br>
                    <input type="radio" name="editProfile" value="1"> Да;<br>
                    <input type="radio" name="editProfile" value="0" checked> Нет;
                </div>
                <div class="form-group">
                    <label for="lifeNews">Новостная лента:</label><br>
                    <input type="radio" name="lifeNews" value="1"> Да;<br>
                    <input type="radio" name="lifeNews" value="0" checked> Нет;
                </div>
                <div class="form-group">
                    <label for="usersLevel">Количество иерархий пользователей:</label><br>
                    <input type="number" name="usersLevel" class="txtb" placeholder="Введите уровней доступа">
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
        @break('case')
        @case('store')
        <h1>Укажите особенности проекта</h1>
        <div class="container">
            <form  action="{{route('poly-page-project', ['type' => 'Store'])}}" method="post">
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
                    <label for="pages">Количество страниц:</label><br>
                    <input type="number"  class="txtb" name="pages" placeholder="Введите количество страниц">
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
                    <label for="api">Количество внешних платформ:</label><br>
                    <input type="number" name="api" class="txtb" placeholder="Введите количество API">
                </div>
                <div class="form-group">
                    <label for="usersLevel">Количество иерархий пользователей:</label><br>
                    <input type="number" name="usersLevel" class="txtb" placeholder="Введите уровней доступа">
                </div>
                <div class="form-group">
                    <label for="editProfile">Наличие профиля клиента:</label><br>
                    <input type="radio" name="editProfile" value="1"> Да;<br>
                    <input type="radio" name="editProfile" value="0" checked> Нет;
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
        @break('case')
        @case('news')
        <h1>Укажите особенности проекта</h1>
        <div class="container">
            <form  action="{{route('poly-page-project', ['type' => 'News'])}}" method="post">
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
                    <label for="pages">Количество страниц:</label><br>
                    <input type="number"  class="txtb" name="pages" placeholder="Введите количество страниц">
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
                    <label for="mail">Сервисы отправки сообщений</label><br>
                    <input type="number" class="txtb" name="mail" placeholder="Введите количество платформ для отправки сообщений">
                </div>
                <div class="form-group">
                    <label for="widget">Количество виджитов:</label><br>
                    <input type="number"  class="txtb" name="widget" placeholder="Введите количество виджетов">
                </div>
                <div class="form-group">
                    <label for="api">Количество внешних платформ:</label><br>
                    <input type="number" name="api" class="txtb" placeholder="Введите количество API">
                </div>
                <div class="form-group">
                    <label for="usersLevel">Количество иерархий пользователей:</label><br>
                    <input type="number" name="usersLevel" class="txtb" placeholder="Введите уровней доступа">
                </div>
                <div class="form-group">
                    <label for="editProfile">Наличие профиля пользователя:</label><br>
                    <input type="radio" name="editProfile" value="1"> Да;<br>
                    <input type="radio" name="editProfile" value="0" checked> Нет;
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
        @break('case')
        @case('image')
        <h1>Укажите особенности проекта</h1>
        <div class="container">
            <form  action="{{route('poly-page-project', ['type' => 'Image'])}}" method="post">
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
                    <label for="pages">Количество страниц:</label><br>
                    <input type="number"  class="txtb" name="pages" placeholder="Введите количество страниц">
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
                    <label for="mail">Сервисы отправки сообщений</label><br>
                    <input type="number" class="txtb" name="mail" placeholder="Введите количество платформ для отправки сообщений">
                </div>
                <div class="form-group">
                    <label for="widget">Количество виджитов:</label><br>
                    <input type="number"  class="txtb" name="widget" placeholder="Введите количество виджетов">
                </div>
                <div class="form-group">
                    <label for="api">Количество внешних платформ:</label><br>
                    <input type="number" name="api" class="txtb" placeholder="Введите количество API">
                </div>
                <div class="form-group">
                    <label for="usersLevel">Количество иерархий пользователей:</label><br>
                    <input type="number" name="usersLevel" class="txtb" placeholder="Введите уровней доступа">
                </div>
                <div class="form-group">
                    <label for="editProfile">Наличие профиля клиента:</label><br>
                    <input type="radio" name="editProfile" value="1"> Да;<br>
                    <input type="radio" name="editProfile" value="0" checked> Нет;
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
        @break('case')

    @endswitch
@endsection
