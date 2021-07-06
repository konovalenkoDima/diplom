<?php

namespace App\Http\Controllers;

use App\Models\TaskWorker;
use Illuminate\Http\Request;

class TaskCostController extends Controller
{
    public function index($id)
    {
        return view('workers_view.task_edit', ['data' => TaskWorker::where('worker_id', $id)->get()]);
    }

    public function update(Request $request, $id)
    {
        $costTask = TaskWorker::where( 'task_id', $id )->where( 'worker_id' , $request->id)->update([
            'cost' => $request->cost
        ]);

        return redirect()->route('worker.show', $request->id);
    }
}
