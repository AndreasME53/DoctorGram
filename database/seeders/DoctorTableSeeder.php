<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // an example of a doctor's data entry
        $d = new Doctor;
        $d->firstName = "Leo";
        $d->lastName = "John";
        $d->phoneNumber = "0000 - 0000";
        $d->hospital_id = 1;
        $d->save();

        // how the doctors factory is called
        $doctor = Doctor::factory()->count(10)->create();
    }
}
