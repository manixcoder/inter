<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_role');
            $table->string('profile_image')->nullable();
            $table->string('org_image')->nullable();
            $table->string('org_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('otp')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('designation')->nullable();
            $table->string('requirter_overview')->nullable();
            $table->string('address')->nullable();
            $table->string('about')->nullable();
            $table->string('create_by')->nullable();
            $table->string('country_id')->nullable();
            $table->string('status')->nullable();
            $table->string('last_login')->nullable();
            $table->string('temp_pass')->nullable();
            $table->string('website')->nullable();
            $table->string('industry')->nullable();
            $table->string('company_size')->nullable();
            $table->string('headquarters')->nullable();
            $table->string('specialties')->nullable();
            $table->string('type')->nullable();
            $table->string('founded')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
