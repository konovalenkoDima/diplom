<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskWorker;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Appraisals;
use App\Models\Calendar;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('workers_view.workers', ['data' => Worker::all()]);
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
        $calendar = new Calendar;
        $colName = 'worker'.$request->id;
        $calendar = DB::statement("ALTER TABLE calendars ADD $colName int(10) ;");
        $workers = new Worker;
        $workers->id = $request->id;
        $workers->name = $request->name;
        $workers->surname = $request->surname;
        $workers->patronymic = $request->patronymic;
        $workers->birthday = $request->birthday;
        $workers->position = $request->position;
        $workers->save();
        $appraisals = new Appraisals;
        $appraisals->id = $request->id;
        $appraisals->HTML = $request->HTML;
        $appraisals->CSS = $request->CSS;
        $appraisals->JS = $request->JS;
        $appraisals->PHP = $request->PHP;
        $appraisals->MySQL = $request->MySQL;
        $appraisals->Laravel = $request->Laravel;
        $appraisals->Design = $request->Design;
        $appraisals->DataBase = $request->DataBase;
        $appraisals->save();
        $countTask = Task::all();
        foreach ($countTask as $el){
            $workerTask = new TaskWorker;
            $workerTask->worker_id = $request->id;
            $workerTask->task_id = $el->id;
            $workerTask->save();
        }
        return redirect(route('workers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('workers_view.worker-edit', ['el' => Worker::where('id', $id)->get(), 'data' =>TaskWorker::where('worker_id', $id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $workers = Worker::find($id);
        $workers->name = $request->name;
        $workers->surname = $request->surname;
        $workers->patronymic = $request->patronymic;
        $workers->birthday = $request->birthday;
        $workers->position = $request->position;
        $workers->save();
        $appraisals = Appraisals::find($id);
        $appraisals->id = $request->id;
        $appraisals->HTML = $request->HTML;
        $appraisals->CSS = $request->CSS;
        $appraisals->JS = $request->JS;
        $appraisals->PHP = $request->PHP;
        $appraisals->MySQL = $request->MySQL;
        $appraisals->Laravel = $request->Laravel;
        $appraisals->Design = $request->Design;
        $appraisals->DataBase = $request->DataBase;
        $appraisals->save();
        return redirect(route('workers'));
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
        $worker = Worker::all()->find($id);
        $worker->delete();
        $app = Appraisals::all()->find($id);
        $app->delete();
        $colName='worker'.$id;;
        $calendar = DB::statement("ALTER TABLE calendars DROP $colName;");
        return redirect(route('worker.index'));
    }
}
