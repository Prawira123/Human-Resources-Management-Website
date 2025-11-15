<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = [
        'fullname',
        'email',
        'phone_number',
        'address',
        'birth_date',
        'hire_date',
        'department_id',
        'role_id',
        'status',
        'salary',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
