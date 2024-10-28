<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\SearchableTrait;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable, SearchableTrait;

    protected $guard = 'employee'; // This is the guard for the employee model
    protected $fillable = [
        'first_name',
        'last_name',
        'email',

        'department_id',
        'password',
        'salary',
        'image',
        'is_manager',
        'manager_id'
    ];

    protected $hidden = [
        'password', // Hide the password field from array and JSON conversions
    ];


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($employee) {
            $employee->password = bcrypt($employee->password); // Encrypt password
        });
    }

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    // Additional methods can go here, if needed
}
