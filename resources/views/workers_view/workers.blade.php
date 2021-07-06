@extends("layouts.main")
@section('links')
    <link href="{{ asset('css/form_add.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aside.css') }}" rel="stylesheet">
    <link href="{{ asset('css/worker.css') }}" rel="stylesheet">
    <script src="{{ asset('js/show-hide-form.js') }}" ></script>
    <script src="{{ asset('js/accordion.js') }}" ></script>
@endsection
@section("container")
    <div class="main">
        <div class="side-bar">
            <div class="toggle-btn">
                <i class="fas fa-bars"></i>
            </div>
            <div class="show-add-admin-btn" >
                <i class="fas fa-plus-square"></i>
                Добавить администратора
            </div>
            <div class="show-add-btn" >
                <i class="fas fa-plus-square"></i>
                Добавить работника
            </div>
        </div>
        <div class="add-admin">
            <div class="hide-add-admin-btn">
                <i class="fas fa-times"></i>
            </div>
            <form method="POST" action="{{ route('register')}}" class="form">
                @csrf
                <input id="name" placeholder="Login" type="text" class="txtb @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >
                @error('name')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
                <input id="email" type="email" class="txtb @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
                <input id="password" type="password" class="txtb @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
                <input id="password-confirm" type="password" class="txtb" name="password_confirmation" required autocomplete="new-password" placeholder="Password confirm">
                <input type="submit" class="add-btn" value="{{ __('Register') }}" placeholder="{{ __('Password') }}">
            </form>
        </div>
        <div class="add">
            <div class="hide-add-btn">
                <i class="fas fa-times"></i>
            </div>
            <form class="form" method="post" action="{{ route('worker.store') }}">
                @csrf
                <div class="form-group">
                    <input class="txtb" type="text" placeholder="Табельный номер" name="id">
                    <input class="txtb" type="text" placeholder="Имя" name="name">

                </div>
                <div class="form-group">
                    <input class="txtb" type="text" placeholder="Отчество" name="patronymic">
                    <input class="txtb" type="text" placeholder="Фамилия" name="surname">

                </div>
                <div class="form-group">
                    <label for="birthday">Дата рождения</label>
                    <input class="txtb" type="date" name="birthday">
                    <input class="txtb" type="text" placeholder="Должность" name="position">
                </div>
                <div class="form-group">
                    <input class="txtb" type="number" placeholder="HTML" name="HTML">
                    <input class="txtb" type="number" placeholder="CSS" name="CSS">
                </div>
                <div class="form-group">
                    <input class="txtb" type="number" placeholder="JS" name="JS">
                    <input class="txtb" type="number" placeholder="PHP"name="PHP">
                </div>
                <div class="form-group">
                    <input class="txtb" type="number" placeholder="MySQL" name="MySQL">
                    <input class="txtb" type="number" placeholder="Laravel" name="Laravel">
                </div>
                <div class="form-group">
                    <input class="txtb" type="number" placeholder="Дизайн" name="Design">
                    <input class="txtb" type="number" placeholder="ОБД" name="DataBase">
                </div>
                <input type="submit" class="add-btn">
            </form>
        </div>
        <h1>Сотрудники</h1>
        <div class="worker">
            @foreach($data as $el)
                <div>
                    <div class="accordion">{{$el->surname}}&nbsp{{$el->name}}&nbsp{{$el->patronymic}}</div>
                    <div class="panel">
                        <div class="inf-cont">
                            <p>Дата рождения: {{$el->birthday}}</p>
                            <p>Должность: {{$el->position}}</p>
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
                                <td>{{$el->appraisals->HTML}}</td>
                                <td>{{$el->appraisals->CSS}}</td>
                                <td>{{$el->appraisals->JS}}</td>
                                <td>{{$el->appraisals->PHP}}</td>
                                <td>{{$el->appraisals->MySQL}}</td>
                                <td>{{$el->appraisals->Laravel}}</td>
                                <td>{{$el->appraisals->Design}}</td>
                                <td>{{$el->appraisals->DataBase}}</td>
                            </tr>
                        </table>

                        <div class="control">
                            <form class="form-control" action="{{route('worker.show', $el->id)}}" method="get">
                                @csrf
                                <button name="submit" class="edit">Редактировать</button>
                            </form>
                            <form class="form-control" action="{{route('worker.destroy', $el->id)}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button name="submit" class="delete">Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
