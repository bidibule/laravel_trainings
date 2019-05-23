<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            
            $table->increments('id')->unsignedInteger();
            $table->string('name');
            $table->date('effective_date');
            $table->unsignedInteger('status');
            $table->text('path')->nullable;
            $table->unsignedInteger('type')->default(1);
            $table->unsignedInteger('version')->default(1);
            $table->unsignedInteger('category_id');
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
        Schema::dropIfExists('trainings');
    }
}
