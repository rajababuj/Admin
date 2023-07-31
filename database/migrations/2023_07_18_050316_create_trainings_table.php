<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('status')->default(1)->comment('1 for active, 2 for inactive');
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('trainings');
    }
}
