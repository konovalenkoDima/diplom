<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    public function appraisals()
    {
        return $this->hasOne(Appraisals::class, 'id');
    }

    public function task()
    {
        return $this->belongsToMany(Task::class, 'worker_task');
    }
}
