<?php

use Illuminate\Database\Seeder;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        factory(Student::class, 5)->create();
    }
}
