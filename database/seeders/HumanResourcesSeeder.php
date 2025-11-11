<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HumanResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('departments')->insert([
            [
                'name' => 'HR',
                'description' => 'Human Resources',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'IT',
                'description' => 'Deparment Information Technology',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sales',
                'description' => 'Department Sales and Marketing',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('roles')->insert([
            [
                'title' => 'HR',
                'description' => 'Handling Team Resources',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Developer',
                'description' => 'Handling Codes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Sales',
                'description' => 'Handling Selling and Marketing',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('employees')->insert([
            [
                'fullname' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'birth_date' => $faker->dateTimeBetween('-40 years', '-20 years'),
                'hire_date' => Carbon::now(),
                'department_id' => 1,
                'role_id' => 1,
                'status' => ' active',
                'salary' =>$faker->randomFloat(2, 1000, 5000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'fullname' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'birth_date' => $faker->dateTimeBetween('-40 years', '-20 years'),
                'hire_date' => Carbon::now(),
                'department_id' => 1,
                'role_id' => 1,
                'status' => ' active',
                'salary' =>$faker->randomFloat(2, 1000, 5000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ]
        ]);

        DB::table('tasks')->insert([
            [
                'title' => implode(' ', $faker->sentences(3)),
                'description' => $faker->paragraph,
                'assigned_to' => 1,
                'due_date' => Carbon::parse('2025-02-17'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => implode(' ', $faker->sentences(3)),
                'description' => $faker->paragraph,
                'assigned_to' => 1,
                'due_date' => Carbon::parse('2025-02-17'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('payrolls')->insert([
            [
                'assigned_to' => 1,
                'salary' => $faker->randomFloat(2, 1000, 5000),
                'bonuses' => $faker->randomFloat(2, 1000, 5000),
                'deductions' => $faker->randomFloat(2, 500, 1000),
                'net_salary' => $faker->randomFloat(2,1000, 5000),
                'pay_date' => Carbon::parse('2025-02-17'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'assigned_to' => 2,
                'salary' => $faker->randomFloat(2, 1000, 5000),
                'bonuses' => $faker->randomFloat(2, 1000, 5000),
                'deductions' => $faker->randomFloat(2, 500, 1000),
                'net_salary' => $faker->randomFloat(2,1000, 5000),
                'pay_date' => Carbon::parse('2025-02-17'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('presences')->insert([
            [
                'assigned_to' => 1,
                'check_in' => Carbon::parse('2025-02-17 09:00:00'),
                'check_out' => Carbon::parse('2025-02-17 17:00:00'),
                'date' => Carbon::parse('2025-02-17'),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'assigned_to' => 2,
                'check_in' => Carbon::parse('2025-02-17 09:00:00'),
                'check_out' => Carbon::parse('2025-02-17 17:00:00'),
                'date' => Carbon::parse('2025-02-17'),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('leave_requests')->insert([
            [
                'assigned_to' => 1,
                'leave_type' => 'sick leave',
                'start_date' => Carbon::parse('2025-02-17'),
                'end_date' => Carbon::parse('2025-04-17'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'assigned_to' => 2,
                'leave_type' => 'vacation leave',
                'start_date' => Carbon::parse('2025-02-17'),
                'end_date' => Carbon::parse('2025-04-17'),
                'status' => 'accepted',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
