<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('salary')->nullable();
            $table->string('logo')->nullable();
            $table->string('attachment')->nullable();
            $table->longText('job_title')->nullable();
            $table->string('location')->nullable();
            $table->string('applicant')->nullable();
            $table->string('create_on')->nullable();
            $table->string('official_email')->nullable();
            $table->longText('offer')->nullable();
            $table->longText('job_description')->nullable();
            $table->string('industry')->nullable();
            $table->enum('status', ['1', '0'])->default(0)->comment = '0=Active, 1=Inactive';
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
        Schema::dropIfExists('jobs');
    }
}
