<?php

namespace App\Http\Controllers;

use App\Models\Appraisals;
use App\Models\Calendar;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\Task;
use App\Models\TaskWorker;
use App\Models\Worker;
use Illuminate\Http\Request;
use Carbon\Carbon;
use phpseclib3\Crypt\EC;
use Illuminate\Support\Facades\Schema;

class ConstructController extends Controller
{
    public function onePage($type, Request $request){

        $row = new Project;
        $row->id = $request->id;
        $row->name = $request->name;
        $row->type = $type;
        $row->save();

        $date = Carbon::now();
        $totalCheck = 0;
        $proectPageStart = 1;
        $proectPageEnd = 0;
        $proectDBStart = 0;
        $designPageStart = 0;
        $visitStart = 0;
        $proectDBEnd = 1;
        if ($request->visit == 1){
            $proectDBStart = 1;
            $proectDBEnd = 0;
        }
        if ($request->mail != 0) {
            $proectDBStart = 1;
            $proectDBEnd = 0;

        }
        $createDBStart = 0;
        $linkDBStart = 0;
        $apiStart = 0;
        $formStart = 0;
        $adminStart = 0;
        $mailStart = 0;
        $widgetStart = 0;
        $hostStart = 0;
        $domainStart = 0;
        $createPageStart = 0;

        if ($request->api != 0){
            $apiEnd = 0;
        } else {
            $apiEnd = 1;
        }
        if ($request->widget != 0){
            $widgetEnd = 0;
        } else {
            $widgetEnd = 1;
        }
        if (($request->visit != 0) or ($request->mail != 0)) {
            $adminEnd = 0;
        } else {
            $adminEnd = 1;
        }
        if ($request->visit == 0){
            $visitEnd = 1;
        } else {
            $visitEnd = 0;
        }
        if ($request->mail == 0){
            $mailEnd = 1;
        } else {
            $mailEnd = 0;
        }
        if ($request->design == 1)
        {
            $designPageEnd = 0;
        } else {
            $designPageEnd = 1;
        }
        $proectPageEnter = 0;
        $designPageEnter = 0;
        $visitEnter = 0;
        $proectDBEnter = 0;
        $createDBEnter = 0;
        $linkDBEnter = 0;
        $apiEnter = 0;
        $formEnter = 0;
        $adminEnter = 0;
        $mailEnter = 0;
        $widgetEnter = 0;
        $hostEnter = 0;
        $domainEnter = 0;
        $createPageEnter = 0;
        $hostEnd = 0;
        $domainEnd = 0;
        $linkDBEnd = 0;
        $createPageEnd = 0;
        $createDBEnd = 0;
        $keyDB = 0;
        $pageKey = 0;
        $check1 = 0;
        $check2 = 0;
        $i = 0;
        do {
            if (($date->dayOfWeek != 0) and ($date->dayOfWeek != 6)) {

//                Загрузка на хостинг
                if ($hostStart == 1)
                {
                    if ($hostEnter != 1) {
                        $hostEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Загрузка на хостинг')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $hostTime = $getTaskId->time;
                    }
                    $hostTime--;
                    if ($hostTime == 0) {
                        $hostStart = 0;
                        $hostEnd = 1;
                        $hostEndDate = $date;
                    }
                }

//                Выкуп доменного имени
                if ($domainStart == 1)
                {
                    if ($domainEnter != 1) {
                        $domainEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Выкуп доменного имени')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $domainTime = $getTaskId->time;
                    }
                    $domainTime--;
                    if ($domainTime == 0) {
                        $domainStart = 0;
                        $domainEnd = 1;
                        $domainEndDate = $date;
                    }
                }

//                Создание админки
                if ($adminStart == 1)
                {
                    if ($adminEnter != 1) {
                        $adminEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Разработка админ панели')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $adminTime = $getTaskId->time;
                    }
                    $adminTime--;
                    if ($adminTime == 0) {
                        $adminStart = 0;
                        $adminEnd = 1;
                        $adminEndDate = $date;
                    }
                }

//                Создание рассылки
                if ($mailStart == 1)
                {
                    if ($mailEnter != 1) {
                        $mailEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Рассылка на почту или соц. сети')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = $request->mail;
                        $project->save();
                        $mailTime = $getTaskId->time * $request->mail;
                    }
                    $mailTime--;
                    if ($mailTime == 0) {
                        $mailStart = 0;
                        $mailEnd = 1;
                        $mailEndDate = $date;
                    }
                }

//                Форма обратной связи
                if ($formStart == 1)
                {
                    if ($formEnter != 1) {
                        $formEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Форма обратной связи')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $formTime = $getTaskId->time;
                    }
                    $formTime--;
                    if ($formTime == 0) {
                        $formStart = 0;
                        $mailStart = 1;
                    }
                    $formEndDate = $date;
                }

//                Поключение API
                if ($apiStart == 1)
                {
                    if ($apiEnter != 1) {
                        $apiEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Внедрение внешних API')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = $request->api;
                        $project->save();
                        $apiTime = $getTaskId->time * $request->api;
                    }
                    $apiTime--;
                    if ($apiTime == 0) {
                        $apiStart = 0;
                        $apiEnd = 1;
                        $apiEndDate = $date;
                    }
                }

//
//                Сбор статистики
                if ($visitStart == 1)
                {
                    if ($visitEnter != 1) {
                        $visitEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Сбор статистики')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $visitTime = $getTaskId->time;
                    }
                    $visitTime--;
                    echo 'asdasd';
                    if ($visitTime == 0) {
                        $visitStart = 0;
                        $visitEnd = 1;
                        $visitEndDate = $date;

                    }
                }
                if (($visitEnd == 1) and ($mailEnd == 1))
                {
                    $adminStart = 1;
                }


//              Подключение виджетов
                if ($widgetStart == 1)
                {
                    if ($widgetEnter != 1) {
                        $widgetEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Подключение виджета')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = $request->widget;
                        $project->save();
                        $widgetTime = $getTaskId->time * $request->widget;
                    }
                    $widgetTime--;
                    if ($widgetTime == 0) {
                        $widgetStart = 0;
                        $widgetEnd = 1;
                        $widgetEndDate = $date;
                    }
                }


                if ($request->hosting == 0)
                {
                    if (($adminEnd == 1) and ($apiEnd == 1) and ($mailEnd == 1) and ($widgetEnd == 1) and ($check1 == 0))
                    {
                        $check1 = 1;
                        $hostStart = 1;
                    }
                } else {
                    $hostEnd = 1;
                }

                if ($request->domain == 0)
                {
                    if (($adminEnd == 1) and ($apiEnd == 1) and ($mailEnd == 1) and ($widgetEnd == 1) and ($check2 == 0))
                    {
                        $check2 = 1;
                        $domainStart = 1;
                    }
                } else {
                    $domainEnd = 1;
                }


//                Подключение базы данных
                if ($linkDBStart == 1)
                {
                    if ($linkDBEnter != 1) {
                        $linkDBEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Подключение базы данных')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $linkDBTime = $getTaskId->time;
                    }
                    $linkDBTime--;
                    if ($linkDBTime == 0) {
                        $linkDBStart = 0;
                        $linkDBEnd = 1;
                        if (($request->visit == 1) or ($request->mail == 1))
                        {
                            $adminStart = 1;
                        }
                        if ($request->visit == 1){
                            $visitStart = 1;
                            $visitEnd = 0;
                        } else {
                            $visitEnd = 1;
                        }
                        if ($request->mail != 0)
                        {
                            $formStart = 1;
                        }
                    }
                }

//              Создание базы данных
                if ($createDBStart == 1) {
                    if ($createDBEnter != 1) {
                        $createDBEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Создание базы данных')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $createDBTime = $getTaskId->time;
                    }
                    $createDBTime--;
                    if ($createDBTime == 0) {
                        $keyDB = 1;
                        $createDBStart = 0;
                        $createDBEnd = 1;
                    }
                }

//                Проектирование базы данных
                if ($proectDBStart == 1) {
                    if ($proectDBEnter != 1) {
                        $proectDBEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Проектирование базы данных')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $proectDBTime = $getTaskId->time;
                    }
                    $proectDBTime--;
                    if ($proectDBTime == 0) {
                        $createDBStart = 1;
                        $proectDBStart = 0;
                        $proectDBEnd = 1;
                    }
                }

//                Верстка страниц
                if ($createPageStart == 1)
                {
                    if ($createPageEnter != 1) {
                        $createPageEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Верстка Страницы')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        if ($request->visit == 1) {
                            $project->count = 2;
                            $createTime = $getTaskId->time * 2;
                        } else {
                            $project->count = 1;
                            $createTime = $getTaskId->time;

                        }
                        $project->save();
                    }
                    $createTime--;
                    if ($createTime == 0) {
                        $createPageStart = 0;
                        $createPageEndDate = $date;
                        if ($request->widget != 0)
                        {
                            $widgetStart = 1;
                        }
                        if ($request->api != 0)
                        {
                            $apiStart = 1;
                        }
                        $pageKey = 1;
                        $createPageEnd = 1;
                    }
                }

                if (($keyDB == 1) and ($pageKey == 1)){
                    $keyDB = 0;
                    $pageKey = 0;
                    $linkDBStart = 1;
                }

//              Дизайн страниц
                if ($designPageStart == 1) {
                    if ($designPageEnter != 1) {
                        $designPageEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Отрисовка страницы')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        if ($request->visit == 1) {
                            $project->count = 2;
                            $designTime = $getTaskId->time * 2;
                        } else {
                            $project->count = 1;
                            $designTime = $getTaskId->time;
                        }
                        $project->save();
                    }
                    $designTime--;
                    if ($designTime == 0) {
                        $createPageStart = 1;
                        $designPageStart = 0;
                        $designPageEndDate = $date;
                        $designPageEnd = 1;
                    }
                }

//                Проектирование страниц
                if ($proectPageStart == 1) {
                    if ($proectPageEnter != 1) {
                        $proectPageEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Проектирование страницы')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        if ($request->visit == 1) {
                            $project->count = 2;
                            $proectTime = $getTaskId->time * 2;
                        } else {
                            $project->count = 1;
                            $proectTime = $getTaskId->time;
                        }
                        $project->save();
                    }
                    $proectTime--;

                    if ($proectTime == 0) {
                        if ($request->design == 1) {
                            $designPageStart = 1;
                            $designPageEnd = 0;
                        } else {
                            $createPageStart = 1;
                            $designPageEnd = 1;
                        }
                        $proectPageStart = 0;
                        $proectPageEnd = 1;
                    }
                }
            }

            $date -> addDay();

            if (($proectPageEnd == 1) and ($designPageEnd == 1) and ($createPageEnd == 1) and ($proectDBEnd == 1)
                and ($visitEnd == 1) and ($createDBEnd == 1) and ($linkDBEnd == 1) and ($apiEnd == 1) and
                ($adminEnd == 1) and ($mailEnd == 1) and ($hostEnd == 1) and ($domainEnd == 1))
            {
                echo 'end';
                $project = new ProjectTask;
                $project -> project_id = $request->id;
                $getTaskId = Task::where('name_task', 'Сдача проекта')
                    ->first();
                $project -> task_id = $getTaskId -> id;
                $project -> earlier = $date;
                $project -> must_end = $date;
                $project -> count = 1;
                $project->save();
                $totalCheck = 1;
            }

        } while ($totalCheck == 0);



        return redirect()->route('late-date', [$request->id, $request->type]);
    }

    public function lateDate ($id, $type)
    {
        $hosting = Task::where('name_task', 'Загрузка на хостинг')->first();
        $domain = Task::where('name_task', 'Выкуп доменного имени')->first();
        $widget = Task::where('name_task', 'Подключение виджета')->first();
        $admin = Task::where('name_task', 'Разработка админ панели')->first();
        $statist = Task::where('name_task', 'Сбор статистики')->first();
        $form = Task::where('name_task', 'Форма обратной связи')->first();
        $endProject = Task::where('name_task', 'Сдача проекта')->first();
        $mail = Task::where('name_task', 'Рассылка на почту или соц. сети')->first();
        $api = Task::where('name_task', 'Внедрение внешних API')->first();
        $linkDB = Task::where('name_task', 'Подключение базы данных')->first();
        $createDB = Task::where('name_task', 'Создание базы данных')->first();
        $proectDB = Task::where('name_task', 'Проектирование базы данных')->first();
        $crearePage = Task::where('name_task', 'Верстка страницы')->first();
        $designPage = Task::where('name_task', 'Отрисовка страницы')->first();
        $proectPage = Task::where('name_task', 'Проектирование страницы')->first();
        $lifeNews = Task::where('name_task', 'Создание новостной ленты')->first();
        $chat = Task::where('name_task', 'Создание чата')->first();
        $editProfile = Task::where('name_task', 'Механизм редактирования профиля')->first();
        $levelUp = Task::where('name_task', 'Добавление нового уровня пользователя')->first();
        $bank = Task::where('name_task', 'Подключение банковской системы')->first();
        $alwaysAdminPanel = array("Coop", "Store", "News", "Image");

//        Виджеты
        if ( $verify = ProjectTask::where('project_id', $id)
                                    ->where('task_id', $widget->id)
                                    ->first() != NULL)
        {
            if ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $hosting->id)
                    ->first()){
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $hosting->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } elseif ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $domain->id)
                    ->first())
            {
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $domain->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } else {
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $endProject->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            }
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $widget->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

//      API
        if ($verify = ProjectTask::where('project_id', $id)
                ->where('task_id', $api->id)
                ->first())
        {
            if ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $hosting->id)
                    ->first()){
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $hosting->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } elseif ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $domain->id)
                    ->first())
            {
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $domain->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } else {
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $endProject->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            }
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $api->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

//      Админка
        if (($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $statist->id)
                    ->first()) or ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $mail->id)
                    ->first()) or (in_array($type, $alwaysAdminPanel)))
        {
            if ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $hosting->id)
                    ->first()){
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $hosting->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } elseif ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $domain->id)
                    ->first())
            {

                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $domain->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } else {
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $endProject->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            }
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $admin->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

//      Статистика посещения
        if ($verify = ProjectTask::where('project_id', $id)
                ->where('task_id', $statist->id)
                ->first())
        {
            $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                ->where('task_id', $admin->id)
                ->first();
            $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $statist->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

        //        Форма обратной связи
        if ($verify = ProjectTask::where('project_id', $id)
                ->where('task_id', $form->id)
                ->first())
        {

            $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                ->where('task_id', $mail->id)
                ->first();
            $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $form->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

        //        Банковская система
        if ($verify = ProjectTask::where('project_id', $id)
            ->where('task_id', $bank->id)
            ->first())
        {
            $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                ->where('task_id', $admin->id)
                ->first();
            $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $bank->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

//        Задача создания рассылки
        if ($verify = ProjectTask::where('project_id', $id)
                ->where('task_id', $mail->id)
                ->first())
        {
            if ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $hosting->id)
                    ->first()){
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $hosting->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } elseif ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $domain->id)
                    ->first())
            {
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $domain->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } else {
                ;
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $endProject->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            }
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $mail->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

//          Подключение базы данных
        if (($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $mail->id)
                    ->first()) or ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $statist->id)
                    ->first()) or (in_array($type, $alwaysAdminPanel)))
        {

            if ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $statist->id)
                    ->first()){
                $getNextTaskId = Task::where('name_task', 'Форма обратной связи')
                    ->first();
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $getNextTaskId->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } elseif ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $mail->id)
                    ->first()){
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $admin->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } elseif ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $lifeNews->id)
                    ->first())
            {
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $lifeNews->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } elseif ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $chat->id)
                    ->first())
            {

                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $chat->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } elseif ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $editProfile->id)
                    ->first())
            {
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $editProfile->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } elseif ($verify = ProjectTask::where('project_id', $id)
                ->where('task_id', $bank->id)
                ->first())
            {
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $bank->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            }

            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $linkDB->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

//        Верстка страницы
        if ($verify = ProjectTask::where('project_id', $id)
                ->where('task_id', $widget->id)
                ->first() ){

            $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                ->where('task_id', $widget->id)
                ->first();
            $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
        } elseif ($verify = ProjectTask::where('project_id', $id)
                ->where('task_id', $api->id)
                ->first()){

            $mustEnd = Carbon::createFromDate($api->earleier);
        } elseif ($verify = ProjectTask::where('project_id', $id)
                ->where('task_id', $linkDB->id)
                ->first()){

            $mustEnd = Carbon::createFromDate($linkDB->earleier);
        }
        $mustEnd->subDay();
        if ($mustEnd->dayOfWeek == 6){
            $mustEnd->subDay();
        } elseif ($mustEnd->dayOfWeek == 0){
            $mustEnd->subDays(2);
        }
        $project = ProjectTask::where('project_id', $id)
            ->where('task_id', $crearePage->id)
            ->update([
                'must_end' => $mustEnd
            ]);

//        Создание базы данных
        if (($verify = ProjectTask::where('project_id', $id)
                ->where('task_id', $mail->id)
                ->first()) or ($verify = ProjectTask::where('project_id', $id)
            ->where('task_id', $statist->id)
            ->first()) or (in_array($type, $alwaysAdminPanel)))
        {


            $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                ->where('task_id', $linkDB->id)
                ->first();
            $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $createDB->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

//        Проектирование базы данных
        if (($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $mail->id)
                    ->first()) or ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $statist->id)
                    ->first()) or (in_array($type, $alwaysAdminPanel)))
        {


            $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                ->where('task_id', $createDB->id)
                ->first();
            $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $proectDB->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

//        Дизайн страницы
        if ($verify = ProjectTask::where('project_id', $id)
                ->where('task_id', $designPage->id)
                ->first()){


            $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                ->where('task_id', $crearePage->id)
                ->first();
            $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $designPage->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

//        Загрузка на хостинг
        if ($verify = ProjectTask::where('project_id', $id)
            ->where('task_id', $hosting->id)
            ->first()){


            $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                ->where('task_id', $endProject->id)
                ->first();
            $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $hosting->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

//        Загрузка на домен
        if ($verify = ProjectTask::where('project_id', $id)
            ->where('task_id', $domain->id)
            ->first()){


            $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                ->where('task_id', $endProject->id)
                ->first();
            $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $domain->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

        // Новостная лента
        if (($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $lifeNews->id)
                    ->first()))
        {

            if ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $hosting->id)
                    ->first()){

                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $hosting->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } elseif ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $domain->id)
                    ->first())
            {

                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $domain->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } else {

                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $endProject->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            }
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $lifeNews->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }
//      Создание чата
        if (($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $chat->id)
                    ->first()) )
        {

            if ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $hosting->id)
                    ->first()){

                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $hosting->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } elseif ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $domain->id)
                    ->first())
            {

                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $domain->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } else {

                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $endProject->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            }
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $chat->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

        // Редактирование пользователя
        if (($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $editProfile->id)
                    ->first()) )
        {

            if ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $hosting->id)
                    ->first()){

                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $hosting->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } elseif ($verify = ProjectTask::where('project_id', $id)
                    ->where('task_id', $domain->id)
                    ->first())
            {

                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $domain->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            } else {

                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $endProject->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
            }
            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $editProfile->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

        // Дополнение иерархии пользователей
        if (($verify = ProjectTask::where('project_id', $id)
                ->where('task_id', $levelUp->id)
                ->first()) )
        {
                $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                    ->where('task_id', $admin->id)
                    ->first();
                $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);

            $mustEnd->subDay();
            if ($mustEnd->dayOfWeek == 6){
                $mustEnd->subDay();
            } elseif ($mustEnd->dayOfWeek == 0){
                $mustEnd->subDays(2);
            }
            $project = ProjectTask::where('project_id', $id)
                ->where('task_id', $levelUp->id)
                ->update([
                    'must_end' => $mustEnd
                ]);
        }

        // Проектирование страницы

        if ($verify = ProjectTask::where('project_id', $id)
                ->where('task_id', $designPage->id)
                ->first()){

            $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                ->where('task_id', $designPage->id)
                ->first();
            $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
        } else {

            $getNextTaskDateStart = ProjectTask::where('project_id', $id)
                ->where('task_id', $crearePage->id)
                ->first();
            $mustEnd = Carbon::createFromFormat('Y-m-d', $getNextTaskDateStart->earlier);
        }
        $mustEnd->subDay();
        if ($mustEnd->dayOfWeek == 6){
            $mustEnd->subDay();
        } elseif ($mustEnd->dayOfWeek == 0){
            $mustEnd->subDays(2);
        }
        $project = ProjectTask::where('project_id', $id)
            ->where('task_id', $proectPage->id)
            ->update([
                'must_end' => $mustEnd
            ]);

        return redirect()->route('devTeam', $id);
    }

    public function polyPage($type, Request $request){
//     Создание нового проекта
        $row = new Project;
        $row->id = $request->id;
        $row->name = $request->name;
        if ($type == 'Coop'){
            $row->type = 'Корпоротивный портал';
        } elseif ($type == 'Store'){
            $row->type = 'Интернет магазин';
        } elseif ($type == 'News'){
            $row->type = 'Новостной портал';
        } else {
            $row->type = 'Имиджевый сайт';
        }
        $row->save();

//      Запись всех задач с ранним временем начала в таблицу
        $date = Carbon::now();

        $linkDBEnd = 0;
        $totalCheck = 0;
        $proectPageStart = 1;
        $designPageStart = 0;
        $proectDBStart = 1;
        if ($request->visit != 1){
            $visitEnd = 1;
        } else {
            $visitEnd = 0;
        }
        $createDBStart = 0;
        $hostStart = 0;
        $domainStart = 0;
        $createPageStart = 0;
        if ($request->api != 0){
            $apiEnd = 0;
        } else {
            $apiEnd = 1;
        }
        if ($request->widget != 0){
            $widgetEnd = 0;
        } else {
            $widgetEnd = 1;
        }
        $adminEnd = 0;

        if ($type == "Coop"){
            $visitEnd = 1;
            $bankEnd = 1;
            if ($request->lifeNews == 1){
                $lifeNewsEnd = 0;
            } else {
                $lifeNewsEnd = 1;
            }
            if ($request->chat == 1){
                $chatEnd = 0;
            } else {
                $chatEnd = 1;
            }
            if ($request->editProfile == 1){
                $editProfileEnd = 0;
            } else {
                $editProfileEnd = 1;
            }
        } elseif ($type == "Store")
        {
            if ($request->stat ==1){
                $visitEnd = 0;
            } else {
                $visitEnd = 1;
            }
            $lifeNewsEnd = 1;
            $bankEnd = 0;
            $chatEnd = 1;
        } elseif($type == "News") {
            $bankEnd = 1;
            if ($request->stat ==1){
                $visitEnd = 0;
            } else {
                $visitEnd = 1;
            }
            $lifeNewsEnd = 0;
            if ($request->chat == 1){
                $chatEnd = 0;
            } else {
                $chatEnd = 1;
            }
        } else {
            $bankEnd = 1;
            if ($request->stat ==1){
                $visitEnd = 0;
            } else {
                $visitEnd = 1;
            }
            if ($request->lifeNews == 1){
                $lifeNewsEnd = 0;
            } else {
                $lifeNewsEnd = 1;
            }
            $chatEnd = 1;
        }
        if ($request->usersLevel != 1){
            $levelUpEnd = 0;
        } else {
            $levelUpEnd = 1;
        }
        $editProfileEnd = 0;
        $proectPageEnter = 0;
        $designPageEnter = 0;
        $visitEnter = 0;
        $proectDBEnter = 0;
        $createDBEnter = 0;
        $linkDBEnter = 0;
        $apiEnter = 0;
        $adminEnter = 0;
        $widgetEnter = 0;
        $hostEnter = 0;
        $bankEnter = 0;
        $domainEnter = 0;
        $createPageEnter = 0;
        $keyDB = 0;
        $pageKey = 0;
        $check1 = 0;
        $check2 = 0;
        $createDBKey = 0;
        $lifeNewsEnter = 0;
        $chatEnter = 0;
        $levelUpEnter = 0;
        $editProfileEnter = 0;
        $news = array("Coop", "News", "Image");
        do {
            if (($date->dayOfWeek != 0) and ($date->dayOfWeek != 6)) {

//                Загрузка на хостинг
                if ($hostStart == 1)
                {
                    if ($hostEnter != 1) {
                        $hostEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Загрузка на хостинг')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $hostTime = $getTaskId->time;
                    }
                    $hostTime--;
                    if ($hostTime == 0) {
                        $hostStart = 0;
                    }
                }

//                Выкуп доменного имени
                if ($domainStart == 1)
                {
                    if ($domainEnter != 1) {
                        $domainEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Выкуп доменного имени')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $domainTime = $getTaskId->time;
                    }
                    $domainTime--;
                    if ($domainTime == 0) {
                        $domainStart = 0;
                    }
                }

//                Создание админки
                if (($keyDB == 1) and ($adminEnd != 1) and ($bankEnd == 1))
                {
                    if ($adminEnter != 1) {
                        $adminEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Разработка админ панели')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $adminTime = $getTaskId->time;
                    }
                    $adminTime--;
                    if ($adminTime == 0) {
                        $adminEnd = 1;
                    }
                }

//                Подключение банковской системы
                if (($keyDB == 1) and ($bankEnd != 1) and ($type == "Store"))
                {
                    if ($bankEnter != 1) {
                        $bankEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Подключение банковской системы')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $bankTime = $getTaskId->time;
                    }
                    $bankTime--;
                    if ($bankTime == 0) {
                        $bankEnd = 1;
                    }
                }


//                Новостная лента
                if (($keyDB == 1) and ($lifeNewsEnd != 1) and (in_array($type, $news)))
                {
                    if ($lifeNewsEnter != 1) {
                        $lifeNewsEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Создание новостной ленты')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $lifeNewsTime = $getTaskId->time;
                    }
                    $lifeNewsTime--;
                    if ($lifeNewsTime == 0) {
                        $lifeNewsEnd = 1;
                    }
                }

//                Добавление нового уровня пользователя
                if (($keyDB == 1) and ($levelUpEnd != 1))
                {
                    if ($levelUpEnter != 1) {
                        $levelUpEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Добавление нового уровня пользователя')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        if ($request->usersLevel != 1){
                            $project->count = $request->usersLevel - 1;
                            $count = $request->usersLevel - 1;
                        } else {
                            $project->count = $request->usersLevel;
                            $count = $request->usersLevel;
                        }
                        $project->save();
                        $levelUpTime = $getTaskId->time * $count;
                    }
                    $levelUpTime--;
                    if ($levelUpTime == 0) {
                        $levelUpEnd = 1;
                    }
                }

//                Чаты
                if (($keyDB == 1) and ($chatEnd != 1) and (in_array($type, $news)))
                {
                    if ($chatEnter != 1) {
                        $chatEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Создание чата')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $chatTime = $getTaskId->time;
                    }
                    $chatTime--;
                    if ($chatTime == 0) {
                        $chatEnd = 1;
                    }
                }

//                Редактирование профиля
                if (($keyDB == 1) and ($editProfileEnd != 1) and ($type != "Image"))
                {
                    if ($editProfileEnter != 1) {
                        $editProfileEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Механизм редактирования профиля')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $editProfileTime = $getTaskId->time;
                    }
                    $editProfileTime--;
                    if ($editProfileTime == 0) {
                        $editProfileEnd = 1;
                    }
                }

//                Поключение API
                if (($pageKey == 1) and ($apiEnd != 1))
                {
                    if ($apiEnter != 1) {
                        $apiEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Внедрение внешних API')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = $request->api;
                        $project->save();
                        $apiTime = $getTaskId->time * $request->api;
                    }
                    $apiTime--;
                    if ($apiTime == 0) {
                        $apiEnd = 1;
                    }
                }


//                Сбор статистики
                if (($keyDB == 1) and ($visitEnd != 1))
                {
                    if ($visitEnter != 1) {
                        $visitEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Сбор статистики')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $visitTime = $getTaskId->time;
                    }
                    $visitTime--;
                    if ($visitTime == 0) {
                        $visitEnd = 1;
                    }
                }


//              Подключение виджетов
                if (($pageKey == 1) and ($widgetEnd != 1))
                {
                    if ($widgetEnter != 1) {
                        $widgetEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Подключение виджета')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = $request->widget;
                        $project->save();
                        $widgetTime = $getTaskId->time * $request->widget;
                    }
                    $widgetTime--;
                    if ($widgetTime == 0) {
                        $widgetEnd = 1;
                    }
                }

                if ($request->hosting == 0)
                {
                    if (($adminEnd == 1) and ($apiEnd == 1) and ($widgetEnd == 1) and ($check1 == 0)
                        and ($editProfileEnd == 1) and ($chatEnd == 1) and ($lifeNewsEnd == 1))
                    {
                        $check1 = 1;
                        $hostStart = 1;
                    }
                }

                if ($request->domain == 0)
                {
                    if (($adminEnd == 1) and ($apiEnd == 1) and ($widgetEnd == 1) and ($check2 == 0)
                        and ($editProfileEnd == 1) and ($chatEnd == 1) and ($lifeNewsEnd == 1))
                    {
                        $check2 = 1;
                        $domainStart = 1;
                    }
                }


//                Подключение базы данных
                if (($pageKey == 1) and ($createDBKey == 1) and ($linkDBEnd != 1))
                {
                    if ($linkDBEnter != 1) {
                        $linkDBEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Подключение базы данных')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $linkDBTime = $getTaskId->time;
                    }
                    $linkDBTime--;
                    if ($linkDBTime == 0) {
                        $linkDBEnd = 1;
                        $keyDB = 1;
                    }
                }

//              Создание базы данных
                if ($createDBStart == 1) {
                    if ($createDBEnter != 1) {
                        $createDBEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Создание базы данных')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $createDBTime = $getTaskId->time;
                    }
                    $createDBTime--;
                    if ($createDBTime == 0) {
                        $createDBStart = 0;
                        $createDBKey = 1;
                    }
                }

//                Проектирование базы данных
                if ($proectDBStart == 1) {
                    if ($proectDBEnter != 1) {
                        $proectDBEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Проектирование базы данных')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = 1;
                        $project->save();
                        $proectDBTime = $getTaskId->time;
                    }
                    $proectDBTime--;
                    if ($proectDBTime == 0) {
                        $createDBStart = 1;
                        $proectDBStart = 0;
                    }
                }

//                Верстка страниц
                if ($createPageStart == 1)
                {
                    if ($createPageEnter != 1) {
                        $createPageEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Верстка Страницы')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = $request->pages;
                        $createTime = $getTaskId->time * $request->pages;
                        $project->save();
                    }
                    $createTime--;
                    if ($createTime == 0) {
                        $createPageStart = 0;
                        $pageKey = 1;
                    }
                }


//              Дизайн страниц
                if ($designPageStart == 1) {
                    if ($designPageEnter != 1) {
                        $designPageEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Отрисовка страницы')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = $request->pages;
                        $designTime = $getTaskId->time * $request->pages;
                        $project->save();
                    }
                    $designTime--;
                    if ($designTime == 0) {
                        $createPageStart = 1;
                        $designPageStart = 0;
                    }
                }

//                Проектирование страниц
                if ($proectPageStart == 1) {
                    if ($proectPageEnter != 1) {
                        $proectPageEnter = 1;
                        $project = new ProjectTask;
                        $project->project_id = $request->id;
                        $getTaskId = Task::where('name_task', 'Проектирование страницы')
                            ->first();
                        $project->task_id = $getTaskId->id;
                        $project->earlier = $date;
                        $project->count = $request->pages;
                        $proectTime = $getTaskId->time * $request->pages;
                        $project->save();
                    }
                    $proectTime--;
                    if ($proectTime == 0) {
                        if ($request->design == 1) {
                            $designPageStart = 1;
                        } else {
                            $createPageStart = 1;
                        }
                        $proectPageStart = 0;
                    }
                }
            }

            $date -> addDay();
            if (($proectPageStart == 0) and ($designPageStart == 0) and ($createPageStart == 0) and ($proectDBStart == 0)
                and ($widgetEnd == 1) and ($createDBStart == 0) and ($linkDBEnd == 1) and ($visitEnd == 1) and
                ($apiEnd == 1) and  ($hostStart == 0) and ($domainStart == 0) and ($editProfileEnd == 1) and
                ($chatEnd == 1) and ($lifeNewsEnd == 1) and ($adminEnd == 1))
            {
                $project = new ProjectTask;
                $project -> project_id = $request->id;
                $getTaskId = Task::where('name_task', 'Сдача проекта')
                    ->first();
                $project -> task_id = $getTaskId -> id;
                $project -> earlier = $date;
                $project -> must_end = $date;
                $project -> count = 1;
                $project->save();
                $totalCheck = 1;
            }

        } while ($totalCheck == 0);



        return redirect()->route('late-date', [$request->id, $type]);
    }

    public function devTeam($id)
    {
        $totalCost = 0;

        $project = ProjectTask::where('project_id', $id)->get();
        foreach ($project as $value)
        {
            $nowCost = 0;
            // Получаем всех работников, кто подходить по скиллам
            $task = Task::find($value->task_id);
            $workers = Appraisals::where('HTML', '>=', $task->task_app->HTML)
                                ->where('CSS', '>=', $task->task_app->CSS)
                                ->where('JS', '>=', $task->task_app->JS)
                                ->where('PHP', '>=', $task->task_app->PHP)
                                ->where('MySQL', '>=', $task->task_app->MySQL)
                                ->where('Laravel', '>=', $task->task_app->Laravel)
                                ->where('Design', '>=', $task->task_app->Design)
                                ->where('DataBase', '>=', $task->task_app->DataBase)
                                ->get();

//            Проверяем наличие даты в календаре
            $colWorker = Schema::getColumnListing('calendars');
            if (Calendar::orderBy('date', 'desc')->first() == null){
                $addDate = new Calendar;
                foreach ($colWorker as $el){
                    if ($el != 'date'){
                        $addDate->$el = '0';
                    }
                }
                $addDate->date = Carbon::now();
                $addDate->save();
            }
            $lastDate = Calendar::orderBy('date', 'desc')
                ->first();

            $lD = Carbon::createFromDate($lastDate->date);
            while ($lD->lt(Carbon::createFromDate($value->must_end)))
            {
                $lD->addDay();
                $addDate = new Calendar;
                foreach ($colWorker as $el){
                    if ($el != 'date'){
                        $addDate->$el = '0';
                    }
                }
                $addDate->date = $lD;
                $addDate->save();
            }

//          Проверяем на занятость сотрудника

            $freeWorkerArray = array();
            $earlierStart = Carbon::createFromDate($value -> earlier);
            $endTask = Carbon::createFromDate($value -> must_end);
            $task = Task::where('id', $value -> task_id)->first();
            $time = $value -> count * $task -> time;
            $bootTime = 0;
            $realTime = 0;
            for ($i=0;$i<$time-1;$i++){
                $earlierStart->addDay();
                $realTime++;
                if ($earlierStart->dayOfWeek == 6){
                    $earlierStart->addDays(2);
                    $realTime += 2;
                } elseif ($earlierStart->dayOfWeek == 0){
                    $earlierStart->addDay();
                    $realTime++;
                }
            }
            $realTime++;
//            echo $value->id.' '.$earlierStart->format('Y-m-d').' '. $endTask->format('Y-m-d').' '.$realTime.'<br>';
            if ($earlierStart->format('Y-m-d') == $endTask->format('Y-m-d')){
                $bootTime = 0;
            } else {
                do
                {
                    $bootTime++;
                    $earlierStart->addDay();
                } while($earlierStart->lte($endTask));
            }
            echo $bootTime.' ';
            $dayList = Calendar::where('date', '>=', $value -> earlier)
                                ->where('date', '<=', $value -> must_end)
                                ->get();


//            Получаем массив работников, которые свободны в данный промежуток времени
            foreach ($workers as $worker)
            {
                $bootTimeForWorker = $bootTime;
                $checking = 1;
                $checkPoint = 0;
                foreach ($dayList as $day){
                    $check = Calendar::where('worker'.$worker->id, '0')
                                        ->where('date', $day->date)
                                        ->first();
                    if (($check == NULL) and ($bootTimeForWorker == 0))
                    {
                        $checking = 0;
                        break;
                    } elseif ($bootTimeForWorker != 0)
                    {
                        $bootTimeForWorker--;
                    }
                    if ($check != NULL){
                        $checkPoint++;
                    }
                    if ($checkPoint == $time){
                        break;
                    }
                }
                if ($checking == 1)
                {
//                    Расчет критерия по знаниям
                    $coefCrit = sqrt(($worker->HTML - $task->task_app->HTML)**2+($worker->CSS - $task->task_app->CSS)**2+
                        ($worker->JS - $task->task_app->JS)**2+($worker->PHP - $task->task_app->PHP)**2+
                        ($worker->Laravel - $task->task_app->Laravel)**2+($worker->MySQL - $task->task_app->MySQL)**2+
                        ($worker->Design - $task->task_app->Design)**2+($worker->DataBase - $task->task_app->DataBase)**2);
                    // Расчет критерия трудовой нагрузки
                    // Выбор промежутка времени неделя назад
                    $days = Carbon::createFromDate($value->earlier);
                    $days->subDays(9);
                    $lastWeek = Calendar::whereBetween('date', [$days, $value->earlier])->get();
                    $colName = 'worker'.$worker->id;
                    $freeDay = 0;
                    foreach ($lastWeek as $item)
                    {
                        if ($item->$colName == 0){
                            $freeDay++;
                        }
                    }
                    $burden = $freeDay/9;
                    // Расчет коеф стоимости

                    $globalCost = TaskWorker::where('task_id', $value->task_id)->avg('cost');
                    $thisCost = TaskWorker::where('worker_id', $worker->id)
                                            ->where('task_id', $value->task_id)
                                            ->first();
                    $costCrit = $thisCost->cost / $globalCost;
                    $totalCoef = ($coefCrit+20*$costCrit)/$burden;
                    $freeWorkerArray[$worker->id] = $totalCoef;

                }
            }

            if (count($freeWorkerArray) == 0){
                return redirect()->route('home', ['data' => 'Не хватает работников']);
            } else {
                $min = min($freeWorkerArray);
            }
            $bestCandidat = array_keys($freeWorkerArray, $min);
            $colName = 'worker'.$bestCandidat[0];
            $nowCost = TaskWorker::find($bestCandidat[0]);
            $totalCost += $nowCost->cost;
            $days = Carbon::createFromDate($value->earlier);
            $date = Calendar::where('date', $days->format('Y-m-d'))->first();
            if ($date->$colName != 0){
                do {
                    $days->addDay();
                    $date = Calendar::where('date', $days->format('Y-m-d'))->first();
                } while ( $date->$colName != 0);
            }
            for ($i=0;$i<$realTime;$i++){
                if (($days->dayOfWeek != 6) and ($days->dayOfWeek != 0)){
                    $edit = Calendar::where('date', $days->format('Y-m-d'))
                        ->update([$colName => $value->id]);
                }
                $days->addDay();
            }
        }

        $project = Project::where('id', $id)
                            ->update([
                                'cost' => $totalCost,
                            ]);



        return redirect()->route('project');
    }
}
