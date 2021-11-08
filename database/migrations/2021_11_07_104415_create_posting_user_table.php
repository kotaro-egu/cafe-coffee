<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostingUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //  TO: 消した人へ。こいつを消すといいね機能が動作しなくなるので消すさないで。
    public function up()
    {
        Schema::create('posting_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('posting_id');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('posting_id')->references('id')->on('postings')->onDelete('cascade');
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
        Schema::dropIfExists('posting_user');
    }
}
