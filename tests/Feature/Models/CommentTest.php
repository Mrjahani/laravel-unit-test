<?php

namespace Tests\Feature\Models;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testInsertData(): void
    {
        $comment = Comment::factory()->make()->toArray();

        Comment::create($comment);

        $this->assertDatabaseHas("comments" , $comment);
    }


    public function testCommentRelationWithPost()
    {
        $comment = Comment::factory()->hasCommentable(Post::class)->create();

        $this->assertTrue(isset($comment->commentable->id));
        $this->assertTrue($comment->commentable instanceof Post);
    }
}
