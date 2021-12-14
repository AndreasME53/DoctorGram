<?php

namespace Database\Seeders;
use App\Models\UserDetail;
use Illuminate\Database\Seeder;

class UserDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = UserDetail::factory()->count(10)->create();
    }
}
