<?php

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        factory(Department::class, 3)->create();
        factory(Student::class, 10)->create();
    }
}