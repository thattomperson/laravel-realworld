<?php

namespace Tests\Feature;

use App\Post;
use App\Tag;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{

    use RefreshDatabase;

    public function testPostOnHomePage()
    {
        $post = factory(Post::class)->create();

        $response = $this->get('/');
        $response->assertOk();

        $response->assertSee($post->name);
    }

    public function testPostOnTagPage()
    {
        $tag = factory(Tag::class)->create();

        $post = factory(Post::class)->create();
        $otherPost = factory(Post::class)->create();

        $post->tags()->sync([$tag->id]);

        $response = $this->get('/tag/' . $tag->id);
        $response->assertOk();

        $response->assertSee($post->name);
        $response->assertDontSee($otherPost->name);
    }

    public function testFavPostsOnFeedPage()
    {
        $user = factory(User::class)->create();

        $post = factory(Post::class)->create();
        $followPost = factory(Post::class)->create();
        $otherPost = factory(Post::class)->create();

        $user->like($post);
        $user->follow($followPost->author);

        $this->actingAs($user)
            ->get('/feed')
            ->assertSee($post->name)
            ->assertSee($followPost->name)
            ->assertDontSee($otherPost->name);
    }
}
