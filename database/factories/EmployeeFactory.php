<?php
namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;
    protected static ?string $password;
    
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'salary' => $this->faker->randomFloat(2, 3000, 10000), // راتب بين 3000 و 10000
            'image' => $this->faker->imageUrl(640, 480, 'people'), 
            'email' => $this->faker->unique()->safeEmail,
            'password' => static::$password ??= Hash::make('password'),
            'manager_id' => 1, 
            'department_id'=>1, 
        ];
    }
}
