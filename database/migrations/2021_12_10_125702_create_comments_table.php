<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->timestamps();


            $table->bigInteger('post_id')->unsigned();

            $table->foreign('post_id')->references('id')->on('posts')
            ->onDelete('cascade')->ouUpdate('cascade'); // sql connecting many to many

            $table->bigInteger('doctor_id')->unsigned();

            $table->foreign('doctor_id')->references('id')->on('doctors')
            ->onDelete('cascade')->ouUpdate('cascade'); // sql connecting many to many

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
