<?php

namespace Database\Seeders;

use App\Models\;
use Illuminate\Database\Seeder;

class DoctorPatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = Doctor::factory()->count(10)->create();

    }
}
