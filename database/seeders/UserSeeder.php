<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'employee_number' => '123',
                'password' => bcrypt('User123'),
                'first_name' =>'Master',
                'last_name' =>'Jack',
                'middle_name' =>'St.',
                'position' =>'Admin',
                'section' =>'Admin - HR',
                'status' =>'1',
            ],
            [
                'employee_number' => '234',
                'password' => bcrypt('User123'),
                'first_name' =>'Disciple',
                'last_name' =>'Joe',
                'middle_name' =>'Pt.',
                'position' =>'Editor',
                'section' =>'Admin - HR',
                'status' =>'1',
            ],
            
        ]);
    }
}
