<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\Task;
use App\Models\Worker;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.project', ['projectList' => Project::all()]);
    }



    public function taskDetail($id, $task_id)
    {

        $allWorker = Worker::all();
        $task = ProjectTask::where('project_id', $id)
                            ->where('task_id', $task_id)
                            ->first();
        foreach ($allWorker as $worker)
        {
            $colName = 'worker'.$worker->id;
            if (count(Calendar::where($colName, $task->id)->get()) != 0){
                return view('project.taskDetail', ['dateTask' => Calendar::where($colName, $task->id)->get(), 'worker' => $worker]);
            }
        }
    }
}
