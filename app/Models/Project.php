<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'project_task');
    }

    public function projectTask()
    {
        return $this->hasMany(ProjectTask::class, 'project_id','id');
    }
}
