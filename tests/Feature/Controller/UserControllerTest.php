<?php

namespace Tests\Feature\Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testIndexMethod(): void
    {
        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
        // $response->assertViewIs("users.home");
        // $response->assertViewHas("users" , User::all());
    }


    public function testShowMethod()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->get(route('users.show' ,  $user->id));


        $response->assertOk();
        $response->assertViewIs("users.show");
        // $response->assertViewHas('user');
    }
}
