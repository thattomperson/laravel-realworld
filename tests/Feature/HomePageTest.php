<?php

namespace Tests\Feature;

use App\Article;
use App\Tag;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function testArticleOnHomePage()
    {
        $article = factory(Article::class)->create();

        $response = $this->get('/');
        $response->assertOk();

        $response->assertSee($article->name);
    }

    public function testArticleOnTagPage()
    {
        $tag = factory(Tag::class)->create();

        $article = factory(Article::class)->create();
        $otherArticle = factory(Article::class)->create();

        $article->tags()->sync([$tag->id]);

        $response = $this->get('/?tag='.$tag->id);
        $response->assertOk();

        $response->assertSee($article->name);
        $response->assertDontSee($otherArticle->name);
    }

    public function testFavArticlesOnFeedPage()
    {
        $user = factory(User::class)->create();

        $article = factory(Article::class)->create();
        $followArticle = factory(Article::class)->create();
        $otherArticle = factory(Article::class)->create();

        $user->like($article);
        $user->follow($followArticle->author);

        $this->actingAs($user)
            ->get('/?feed')
            ->assertSee($article->name)
            ->assertSee($followArticle->name)
            ->assertDontSee($otherArticle->name);
    }
}
