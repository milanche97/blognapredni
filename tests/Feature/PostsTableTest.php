<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTableTest extends TestCase
{


    public function testPostCreation()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $post->save();
        $this->assertDataBaseHas(
            'posts',
            [
                'title' =>$post->title,
                'body' => $post->body
                ]
        );
    }
}
