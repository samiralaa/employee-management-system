<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeFeatureTest extends TestCase
{
//  use RefreshDatabase;

    /** @test */
    public function it_displays_employee_index_page()
    {
        $response = $this->get(route('employees.index'));

        $response->assertStatus(200);
        $response->assertSee('Employee Directory');
    }

    /** @test */
    public function it_can_create_an_employee_via_form()
    {
        $data = [
            'first_name' => 'Samir',
            'last_name' => 'Alaa',
            'email' => 'samir@example.com',
            'manger_id' => 1,  // Ensure manager exists or use factory
            'password' => 'password',
            'image'=> 'image.jpg',
            'department_id' => 1,  // Ensure department exists or use factory
        ];

        $response = $this->post(route('employees.store'), $data);

        $response->assertRedirect(route('employees.index'));
        $this->assertDatabaseHas('employees', $data);
    }

    /** @test */
    public function it_can_update_an_employee_via_form()
    {
        $employee = Employee::factory()->create();

        $data = ['first_name' => 'Updated Name'];

        $response = $this->put(route('employees.update', $employee->id), $data);

        $response->assertRedirect(route('employees.index'));
        $this->assertDatabaseHas('employees', $data);
    }

    /** @test */
    public function it_can_delete_an_employee()
    {
        $employee = Employee::factory()->create();

        $response = $this->delete(route('employees.destroy', $employee->id));

        $response->assertRedirect(route('employees.index'));
        $this->assertDatabaseMissing('employees', ['id' => $employee->id]);
    }
}
