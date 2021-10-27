<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('created_by');
            $table->string('blog_heading');
            $table->longText('description');
            $table->integer('posted_date_and_time');
            $table->string('blog_image');
            $table->integer('feature_blog');
            $table->enum('status', ['1', '0'])->default(0)->comment = '0=Active, 1 =Inactive';
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
        Schema::dropIfExists('blogs');
    }
}
