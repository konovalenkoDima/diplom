<?php

namespace App\Http\Controllers;

use App\Models\Task_app;
use App\Models\Worker;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskWorker;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('task.tasks', ['data' => Task::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tasks = new Task;
        $tasks->id = $request->id;
        $tasks->name_task = $request->name_task;
        $tasks->time = $request->time;
        $tasks->save();
        $tasks_app = new Task_app;
        $tasks_app->id = $request->id;
        $tasks_app->HTML = $request->HTML;
        $tasks_app->CSS = $request->CSS;
        $tasks_app->JS = $request->JS;
        $tasks_app->PHP = $request->PHP;
        $tasks_app->MySQL = $request->MySQL;
        $tasks_app->Laravel = $request->Laravel;
        $tasks_app->Design = $request->Design;
        $tasks_app->DataBase = $request->DataBase;
        $tasks_app->save();
        $countWorkers = Worker::all();
        foreach ($countWorkers as $el){
            $workerTask = new TaskWorker;
            $workerTask->worker_id = $el->id;
            $workerTask->task_id = $request->id;
            $workerTask->save();
        }
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('task.task-edit', ['el' => Task::where('id', $id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $tasks = Task::find($id);
        $tasks->name_task = $request->name_task;
        $tasks->time = $request->time;
        $tasks->save();
        $tasks_app = Task_app::find($id);
        $tasks_app->HTML = $request->HTML;
        $tasks_app->CSS = $request->CSS;
        $tasks_app->JS = $request->JS;
        $tasks_app->PHP = $request->PHP;
        $tasks_app->MySQL = $request->MySQL;
        $tasks_app->Laravel = $request->Laravel;
        $tasks_app->Design = $request->Design;
        $tasks_app->DataBase = $request->DataBase;
        $tasks_app->save();
        return redirect(route('tasks.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
