<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\HoursModel;

class HoursControllerTest extends TestCase
{
    public function test_submit_hours()
    {
        $userAttributes = [
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ];

        $user = User::firstOrCreate(['email' => $userAttributes['email']], $userAttributes);

        $this->actingAs($user);


        $response = $this->post('/submit-hours', ['hours' => 5]);

        $response->assertStatus(302);
        $response->assertSessionHas('success', 'Отработанные часы успешно добавлены');

        $this->assertDatabaseHas('hours', [
            'employee_id' => $user->id,
            'hours' => 5,
        ]);
    }


}
