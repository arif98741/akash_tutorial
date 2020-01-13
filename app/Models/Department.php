<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
