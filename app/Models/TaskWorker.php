<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskWorker extends Model
{
    use HasFactory;

    protected $table = 'worker_task';

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public $timestamps = false;
}
