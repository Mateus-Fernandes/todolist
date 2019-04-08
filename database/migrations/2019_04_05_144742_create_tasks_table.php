<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('todo_id')->unsigned();
            $table->foreign('todo_id')->references('id')->on('todos')->onDelete('cascade');   // Ref to todos table, on delete todo delete all tasks          
            $table->string('name', 191);
            $table->boolean('status'); // status - active or not
            $table->integer('parent')->unsigned()->nullable();
            $table->foreign('parent')->references('id')->on('tasks')->onDelete('cascade'); // Important: if delete parent task all childs is deleted
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
        Schema::dropIfExists('tasks');
    }
}
