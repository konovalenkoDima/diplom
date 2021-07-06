<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function task_app()
    {
        return $this->hasOne(Task_app::class, 'id');
    }

    public function workers()
    {
        return $this->belongsToMany(Worker::class, 'worker_task');
    }

    public function project()
    {
        return $this->belongsToMany(Project::class, 'project_task');
    }

    public function projectTask()
    {
        return $this->hasMany(ProjectTask::class, 'task_id','id');
    }
}
