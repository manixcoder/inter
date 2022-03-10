<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('age')->nullable();
            $table->string('languages')->nullable();
            //$table->string('accessories')->nullable();
            $table->string('work_hours')->nullable();
            $table->string('work_days')->nullable();
            $table->string('experience')->nullable();
            $table->string('background_check')->nullable();
            $table->string('drug_test')->nullable();
            $table->string('salary_amount')->nullable();
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
        Schema::dropIfExists('questionnaires');
    }
}
