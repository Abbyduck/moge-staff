<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Staffs;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //departments
        $departments =[
            ['name'=>'运营部'],
            ['name'=>'原创组'],
            ['name'=>'包装组'],
            ['name'=>'三维部'],
            ['name'=>'逐帧组'],
            ['name'=>'美术组'],
            ['name'=>'实习组'],
        ];
        DB::table('departments')->insert($departments);

        //users
        User::factory()->count(2)->create();

        //some staffs

        Staffs::factory()->count(100)->create();

    }
}
