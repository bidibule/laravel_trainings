<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_training', function (Blueprint $table) {
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('training_id');
            $table->timestamps();

            $table->primary(['group_id', 'training_id']);

            //FK
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_training');
    }
}
