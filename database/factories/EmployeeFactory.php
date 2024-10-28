<?php
namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'salary' => $this->faker->randomFloat(2, 3000, 10000), // راتب بين 3000 و 10000
            'image' => $this->faker->imageUrl(640, 480, 'people'), // صورة عشوائية
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // يمكنك تغيير كلمة المرور إلى ما تريده
            'manager_id' => 1, // إنشاء مدير عشوائي
            'department_id'=>1, // إنشاء دار عشوائي
        ];
    }
}
