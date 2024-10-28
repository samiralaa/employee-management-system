<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Department::factory()->count(5)->create(); // Adjust count as necessary

        Employee::factory()->create([
                'first_name' => 'Test User',
            'email' => 'test@example.com',
         
        ]);

      

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

   
    }
}