<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('phoneNumber');
            $table->string('hospital_name')->nullable();
            $table->string('hospital_address')->nullable();
            $table->text('field')->nullable();


           // $table->bigInteger('user_id')->unsigned();
            
            
          //  $table->foreign('user_id')->references('id')->on('users')
             //    ->onDelete('cascade')->ouUpdate('cascade'); // sql connecting one to many
            
            
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
        Schema::dropIfExists('doctors');
    }
}
