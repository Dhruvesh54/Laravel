<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StudentSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('registration')->insert([
                'name'=> fake()->name() ,
                'email' => fake()->unique()->safeEmail(), 
                'password'=> "Pass".$i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
