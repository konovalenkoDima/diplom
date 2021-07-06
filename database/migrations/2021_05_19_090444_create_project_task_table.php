<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateProjectTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_task', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('task_id');
            $table->integer('count')->default('1');
            $table->date('earlier');
            $table->date('must_end')->default(Carbon::now());
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_task');
    }
}
