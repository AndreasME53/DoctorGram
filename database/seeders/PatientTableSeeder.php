<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // an example of a patient's data entry
        $p1 = new Patient;
        $p1->firstName = "James";
        $p1->lastName = "May";
        $p1->phoneNumber = "5555 - 6049";
        $p1->address = "123 drive way england";
        $p1->symptom = "stomach cramps as a result of eating undercooked meat";
        $p1->insurenceNumber = "6606192211041";
        $p1->save();
         // connected to multiple doctors for different examinations
        $p1->doctors()->attach(1);
        $p1->doctors()->attach(4);

        $p2 = new Patient;
        $p2->firstName = "Richard";
        $p2->lastName = "Hammond";
        $p2->phoneNumber = "5555 - 8793";
        $p2->address = "55 kent drive england";
        $p2->symptom = "neck pain from falling of a ladder";
        $p2->insurenceNumber = "63824362186329";
        $p2->save();
        // connected to multiple doctors for different examinations
        $p2->doctors()->attach(2);
        $p2->doctors()->attach(6);
        $p2->doctors()->attach(3);


        // fatory adding randomn patients
        $patient = Patient::factory()->count(10)->create();
        
        // Get all the roles attaching up to 3 random roles to each user
//$patients = Patient::all();

// Populate the pivot table
//Doctor::all()->each(function ($doctor) use ($patients) { 
  //  $doctor->patients()->attach(
 //       $patients->random(rand(1, 10))->pluck('id')->toArray()
 //   ); 
//});
    }
}
