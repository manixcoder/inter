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
            $table->integer('created_by')->nullable();
            $table->string('blog_heading')->nullable();
            $table->longText('description')->nullable();
            $table->timestamp('posted_date_and_time')->nullable();
            $table->string('blog_image')->nullable();
            $table->integer('feature_blog')->nullable();
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
