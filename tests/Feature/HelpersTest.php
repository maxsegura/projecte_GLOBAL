<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelpersTest extends TestCase
{
    use RefreshDatabase;
    public function test_create_default_user_and_professor()
    {
        // Arrange: Definir dades inicials
        $defaultUserData = [
            'name' => config('users.default_user.name'),
            'email' => config('users.default_user.email'),
            'password' => bcrypt(config('users.default_user.password')),
        ];

        $professorUserData = [
            'name' => config('users.professor.name'),
            'email' => config('users.professor.email'),
            'password' => bcrypt(config('users.professor.password')),
        ];

        // Act: Crear usuaris i associar-los a un team
        $team = \App\Models\Team::factory()->create();
        $defaultUser = \App\Helpers\UserHelper::createUser($defaultUserData, $team);
        $professor = \App\Helpers\UserHelper::createUser($professorUserData, $team);

        // Assert: Comprovar que els usuaris s'han creat correctament
        $this->assertDatabaseHas('users', ['email' => $defaultUserData['email']]);
        $this->assertDatabaseHas('users', ['email' => $professorUserData['email']]);
        $this->assertTrue($defaultUser->teams->contains($team));
        $this->assertTrue($professor->teams->contains($team));
    }

}


