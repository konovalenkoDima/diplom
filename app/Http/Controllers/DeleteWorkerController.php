<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class DeleteWorkerController extends Controller
{
    public function index($id){
        $workers = Worker::find($id);
        $workers->delete();
        return redirect()->route('worker.index');
    }
}
