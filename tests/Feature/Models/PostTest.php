<?php

namespace Tests\Feature\Models;

use App\Models\Comment;
use App\Models\Post;
use App\Models\tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testInsertData(): void
    {
        $post = Post::factory()->make()->toArray();
        Post::create($post);

        $this->assertDatabaseHas('posts' , $post);
    }


    public function testPostRelationWithUser()
    {

        $post = Post::factory()->for(User::factory())->create();

        $this->assertTrue(isset($post->user->id));
        $this->assertTrue($post->user instanceof User);

    }


    public function testPostRelationWithTag()
    {
        $count = rand(0,10);
        $post = Post::factory()->hasTags($count)->create();

        $this->assertCount($count , $post->tags);
        $this->assertTrue($post->tags()->first() instanceof Tag);
    }


    public function testPostRelationWithComment()
    {
        $count = rand(1 , 10);
        $post = Post::factory()->hasComments($count)->create();

        $this->assertCount($count , $post->comments);
        $this->assertTrue($post->comments->first() instanceof Comment);
    }



}
