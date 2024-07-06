<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('users')->insert([
         [
            'name'=>'admin user',
            'username'=>'admin',
            'email'=>'admin@email.com',
            'role'=>'admin',
            'status'=>'active',
            'password'=>bcrypt('password'),
         ],
         [
            'name'=>'user',
            'username'=>'user',
            'email'=>'user@email.com',
            'role'=>'user',
            'status'=>'active',
            'password'=>bcrypt('password'),
         ],
         [
            'name'=>'vendor',
            'username'=>'vendor',
            'email'=>'vendor@email.com',
            'role'=>'vendor',
            'status'=>'active',
            'password'=>bcrypt('password'),
         ]
       ]); 
    }
}
