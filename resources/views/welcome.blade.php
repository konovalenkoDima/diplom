@extends('layouts.main')

@section('title')
    <title>Новый проект</title>
@endsection

@section('links')
    <link href="{{asset('css/welcome.css')}}" rel="stylesheet">
@endsection

@section('container')
    <div class="menu">
        <div class="card-1 btn-menu">
            <div class="front">
                <p class="icon">
                    <i class="fas fa-id-card"></i>
                </p>
                <span>Одностраничный сайт</span>
            </div>
            <div class="back">
                <span>Выберите раздел</span>
                <ul>
                    <li><a href="{{route('one-page', ['type' => 'lending'])}}">Лендинговая страница</a></li>
                    <li><a href="{{route('one-page', ['type' => 'visit'])}}">Сайт визитка</a></li>
                </ul>
            </div>

        </div>
        <div class="card-2 btn-menu">
            <div class="front">
                <p class="icon">
                    <i class="far fa-gem"></i>
                </p>
                <span>Многостраничный сайт</span>
            </div>
            <div class="back">
                <span>Выберите раздел</span>
                <ul>
                    <li><a href="{{route('poly-page', ['type' => 'coop'])}}">Корпоративный сайт</a></li>
                    <li><a href="{{route('poly-page', ['type' => 'store'])}}">Интернет магазин</a></li>
                    <li><a href="{{route('poly-page', ['type' => 'news'])}}">Новостной портал</a></li>
                    <li><a href="{{route('poly-page', ['type' => 'image'])}}">Имиджевый сайт</a></li>
                </ul>
            </div>
        </div>
    </div>

@endsection
