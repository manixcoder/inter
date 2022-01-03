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
            $table->enum('users_role', ['1', '2','3'])->default(2)->comment = '1 = Admin  2 = Student 3 = Recruiter';
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('profile_image')->nullable();
            $table->string('org_image')->nullable();
            $table->string('org_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('otp')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('designation')->nullable();
            $table->longText('requirter_overview')->nullable();
            $table->string('address')->nullable();
            $table->longText('about')->nullable();
            $table->string('create_by')->nullable();
            $table->string('country_id')->nullable();
            $table->string('status')->nullable();
            $table->string('last_login')->nullable();
            $table->string('temp_pass')->nullable();
            $table->string('website')->nullable();
            $table->string('industry')->nullable();
            $table->string('company_size')->nullable();
            $table->longText('headquarters')->nullable();
            $table->longText('specialties')->nullable();
            $table->string('type')->nullable();
            $table->string('founded')->nullable();            
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