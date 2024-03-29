<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Task_app;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = new Task;
        $tasks->id = 1;
        $tasks->name_task = 'Проектирование страницы';
        $tasks->time = 1;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 1;
        $tasks_app->HTML = 0;
        $tasks_app->CSS = 0;
        $tasks_app->JS = 0;
        $tasks_app->PHP = 0;
        $tasks_app->MySQL = 0;
        $tasks_app->Laravel = 0;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 0;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 2;
        $tasks->name_task = 'Отрисовка страницы';
        $tasks->time = 1;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 2;
        $tasks_app->HTML = 0;
        $tasks_app->CSS = 0;
        $tasks_app->JS = 0;
        $tasks_app->PHP = 0;
        $tasks_app->MySQL = 0;
        $tasks_app->Laravel = 0;
        $tasks_app->Design = 7;
        $tasks_app->DataBase = 0;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 3;
        $tasks->name_task = 'Верстка страницы';
        $tasks->time = 1;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 3;
        $tasks_app->HTML = 7;
        $tasks_app->CSS = 6;
        $tasks_app->JS = 6;
        $tasks_app->PHP = 0;
        $tasks_app->MySQL = 0;
        $tasks_app->Laravel = 6;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 0;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 4;
        $tasks->name_task = 'Проектирование базы данных';
        $tasks->time = 2;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 4;
        $tasks_app->HTML = 0;
        $tasks_app->CSS = 0;
        $tasks_app->JS = 0;
        $tasks_app->PHP = 0;
        $tasks_app->MySQL = 0;
        $tasks_app->Laravel = 0;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 7;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 5;
        $tasks->name_task = 'Создание базы данных';
        $tasks->time = 2;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 5;
        $tasks_app->HTML = 0;
        $tasks_app->CSS = 0;
        $tasks_app->JS = 0;
        $tasks_app->PHP = 7;
        $tasks_app->MySQL = 6;
        $tasks_app->Laravel = 6;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 5;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 6;
        $tasks->name_task = 'Подключение базы данных';
        $tasks->time = 3;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 6;
        $tasks_app->HTML = 5;
        $tasks_app->CSS = 3;
        $tasks_app->JS = 3;
        $tasks_app->PHP = 7;
        $tasks_app->MySQL = 6;
        $tasks_app->Laravel = 6;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 5;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 7;
        $tasks->name_task = 'Разработка админ панели';
        $tasks->time = 2;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 7;
        $tasks_app->HTML = 6;
        $tasks_app->CSS = 4;
        $tasks_app->JS = 5;
        $tasks_app->PHP = 7;
        $tasks_app->MySQL = 6;
        $tasks_app->Laravel = 7;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 4;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 8;
        $tasks->name_task = 'Внедрение внешних API';
        $tasks->time = 1;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 8;
        $tasks_app->HTML = 7;
        $tasks_app->CSS = 4;
        $tasks_app->JS = 5;
        $tasks_app->PHP = 0;
        $tasks_app->MySQL = 0;
        $tasks_app->Laravel = 6;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 0;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 9;
        $tasks->name_task = 'Рассылка на почту или соц. сети';
        $tasks->time = 1;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 9;
        $tasks_app->HTML = 5;
        $tasks_app->CSS = 0;
        $tasks_app->JS = 0;
        $tasks_app->PHP = 7;
        $tasks_app->MySQL = 6;
        $tasks_app->Laravel = 6;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 4;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 10;
        $tasks->name_task = 'Подключение виджета';
        $tasks->time = 1;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 10;
        $tasks_app->HTML = 6;
        $tasks_app->CSS = 5;
        $tasks_app->JS = 3;
        $tasks_app->PHP = 0;
        $tasks_app->MySQL = 0;
        $tasks_app->Laravel = 5;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 0;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 11;
        $tasks->name_task = 'Выкуп доменного имени';
        $tasks->time = 1;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 11;
        $tasks_app->HTML = 0;
        $tasks_app->CSS = 0;
        $tasks_app->JS = 0;
        $tasks_app->PHP = 0;
        $tasks_app->MySQL = 0;
        $tasks_app->Laravel = 0;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 0;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 12;
        $tasks->name_task = 'Загрузка на хостинг';
        $tasks->time = 1;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 12;
        $tasks_app->HTML = 0;
        $tasks_app->CSS = 0;
        $tasks_app->JS = 0;
        $tasks_app->PHP = 0;
        $tasks_app->MySQL = 0;
        $tasks_app->Laravel = 0;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 0;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 13;
        $tasks->name_task = 'Форма обратной связи';
        $tasks->time = 1;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 13;
        $tasks_app->HTML = 6;
        $tasks_app->CSS = 0;
        $tasks_app->JS = 4;
        $tasks_app->PHP = 5;
        $tasks_app->MySQL = 4;
        $tasks_app->Laravel = 5;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 0;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 14;
        $tasks->name_task = 'Сбор статистики';
        $tasks->time = 1;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 14;
        $tasks_app->HTML = 6;
        $tasks_app->CSS = 0;
        $tasks_app->JS = 0;
        $tasks_app->PHP = 7;
        $tasks_app->MySQL = 6;
        $tasks_app->Laravel = 7;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 5;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 15;
        $tasks->name_task = 'Сдача проекта';
        $tasks->time = 1;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 15;
        $tasks_app->HTML = 0;
        $tasks_app->CSS = 0;
        $tasks_app->JS = 0;
        $tasks_app->PHP = 0;
        $tasks_app->MySQL = 0;
        $tasks_app->Laravel = 0;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 0;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 16;
        $tasks->name_task = 'Создание чата';
        $tasks->time = 2;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 16;
        $tasks_app->HTML = 6;
        $tasks_app->CSS = 3;
        $tasks_app->JS = 5;
        $tasks_app->PHP = 7;
        $tasks_app->MySQL = 7;
        $tasks_app->Laravel = 7;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 5;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 17;
        $tasks->name_task = 'Механизм редактирования профиля';
        $tasks->time = 2;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 17;
        $tasks_app->HTML = 6;
        $tasks_app->CSS = 3;
        $tasks_app->JS = 4;
        $tasks_app->PHP = 7;
        $tasks_app->MySQL = 6;
        $tasks_app->Laravel = 7;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 4;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 18;
        $tasks->name_task = 'Создание новостной ленты';
        $tasks->time = 1;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 18;
        $tasks_app->HTML = 6;
        $tasks_app->CSS = 3;
        $tasks_app->JS = 4;
        $tasks_app->PHP = 7;
        $tasks_app->MySQL = 6;
        $tasks_app->Laravel = 6;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 3;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 19;
        $tasks->name_task = 'Добавление нового уровня пользователя';
        $tasks->time = 1;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 19;
        $tasks_app->HTML = 5;
        $tasks_app->CSS = 2;
        $tasks_app->JS = 3;
        $tasks_app->PHP = 7;
        $tasks_app->MySQL = 6;
        $tasks_app->Laravel = 6;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 3;
        $tasks_app->save();

        $tasks = new Task;
        $tasks->id = 20;
        $tasks->name_task = 'Подключение банковской системы';
        $tasks->time = 3;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = 20;
        $tasks_app->HTML = 5;
        $tasks_app->CSS = 2;
        $tasks_app->JS = 3;
        $tasks_app->PHP = 7;
        $tasks_app->MySQL = 6;
        $tasks_app->Laravel = 7;
        $tasks_app->Design = 0;
        $tasks_app->DataBase = 5;
        $tasks_app->save();
    }
}
