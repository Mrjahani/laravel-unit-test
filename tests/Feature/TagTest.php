<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Models\ModelHelperTesting;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase , ModelHelperTesting;

    public function testTagRelationWithpost()
    {
        $count = rand(1 , 10);
        $tag = Tag::factory()->hasPosts($count)->create();

        $this->assertCount($count , $tag->posts);
        $this->assertTrue($tag->posts()->first() instanceof Post);
    }

    public function model()
    {
        return new Tag();
    }
}
