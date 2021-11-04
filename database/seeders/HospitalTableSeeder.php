<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Seeder;

class HospitalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // an example of a hospital's data entry
        $e = new  Hospital;
        $e->ward_name = 'General ward';
        $e->hospital_name = 'Care Medical Clinic';
        $e->save();

         // fatory adding randomn hospitals data
        $hospital = Hospital::factory()->count(5)->create();
    }
}
