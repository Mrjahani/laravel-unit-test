<?php

namespace Tests\Feature\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testInsertData(): void
    {
        $user = User::factory()->make()->toArray();
        $user['password'] = Hash::make('16548946');

        User::create($user);
        $this->assertDatabaseHas('users' , $user);
    }

    public function testUserRelationWithPost()
    {
        $count = rand(1 , 10);

        $user = User::factory()->has(Post::factory()->count($count))->create();
        // $user = User::factory()->hasPosts($count)->create();

        $this->assertCount($count , $user->posts);
        $this->assertTrue($user->posts()->first() instanceof Post);

    }
}
