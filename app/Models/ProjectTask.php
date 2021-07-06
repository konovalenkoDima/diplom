<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    use HasFactory;

    protected $table = 'project_task';

    public $timestamps=false;

    public function tasks(){
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function project(){
        return $this->belongsTo(Project::class, 'project_id');
    }
}
