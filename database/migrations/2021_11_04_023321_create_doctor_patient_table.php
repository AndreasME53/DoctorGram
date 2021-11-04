<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_patient', function (Blueprint $table) {
            $table->primary(['doctor_id', 'patient_id']);
            $table->bigInteger('doctor_id')->unsigned();
            $table->bigInteger('patient_id')->unsigned();
            $table->timestamps();


            $table->foreign('doctor_id')->references('id')->on('doctors')
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
        Schema::dropIfExists('doctor_patient');
    }
}
