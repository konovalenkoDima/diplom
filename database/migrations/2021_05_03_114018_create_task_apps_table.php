<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_apps', function (Blueprint $table) {
            $table->id();
            $table->integer('HTML');
            $table->integer('CSS');
            $table->integer('JS');
            $table->integer('PHP');
            $table->integer('MySQL');
            $table->integer('Laravel');
            $table->integer('Design');
            $table->integer('DataBase');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_apps');
    }
}
