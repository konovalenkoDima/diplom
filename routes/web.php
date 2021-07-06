<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkersController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DeleteWorkerController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ConstructController;
use App\Http\Controllers\TaskCostController;
use App\Http\Controllers\ProjectController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();




route::middleware('auth')->group(function (){
    Route::get('/workers', [WorkersController::class, 'index'])->name('workers');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('tasks', TaskController::class);
    Route::get('/one-page/{id}/lateDate/{type}', [ConstructController::class, 'lateDate'])->name('late-date');
    Route::get('/new-project/{id}/devTeam/', [ConstructController::class, 'devTeam'])->name('devTeam');
    Route::get('/one-page/{type}', [FormController::class, 'onePage'])->name('one-page');
    Route::get('/poly-page/{type}', [FormController::class, 'polyPage'])->name('poly-page');
    Route::post('/new-one-page-project/{type}', [ConstructController::class, 'onePage'])->name('one-page-project');
    Route::post('/new-poly-page-project/{type}', [ConstructController::class, 'polyPage'])->name('poly-page-project');
    Route::get('/worker/{id}/task', [TaskCostController::class, 'index'])->name('change-cost');
    Route::post('/worker/{id}/task', [TaskCostController::class, 'update'])->name('update-cost');
    Route::get('/project', [ProjectController::class, 'index'])->name('project');
    Route::get('/project/{id}/{task_id}', [ProjectController::class, 'taskDetail'])->name('taskDetail');
    Route::resource('worker', WorkersController::class);
});


