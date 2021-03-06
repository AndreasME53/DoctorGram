<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_patient', function (Blueprint $table) {
            $table->primary(['user_id', 'patient_id']);
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('patient_id')->unsigned();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->ouUpdate('cascade'); // sql connecting many to many

            $table->foreign('patient_id')->references('id')->on('patients')
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
        Schema::dropIfExists('user_patient');
    }
}
