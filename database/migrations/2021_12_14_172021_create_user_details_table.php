<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('phoneNumber')->nullable();
            $table->text('field')->nullable();

            $table->bigInteger('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('user_details');
    }
}
