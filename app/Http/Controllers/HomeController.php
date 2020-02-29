<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showGlobal()
    {
        $article = Article::paginate();
        $tags = Tag::all();

        return view('home')
            ->withArticles($article)
            ->withTags($tags)
            ->withPage('global');
    }

    public function showFeed()
    {
        $user = Auth::user();

        $articles = Article::whereHas('likes', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->orWhereHas('author.followers', function ($query) use ($user) {
            $query->where('follower_id', $user->id);
        })->paginate();

        $tags = Tag::all();

        return view('home')
            ->withArticles($articles)
            ->withTags($tags)
            ->withPage('feed');
    }

    public function showTag($tagId)
    {
        $tag = Tag::find($tagId);

        $articles = Article::whereHas('tags', function ($query) use ($tag) {
            $query->where('tags.id', $tag->id);
        })->paginate();

        $tags = Tag::all();

        return view('home')
            ->withArticles($articles)
            ->withTags($tags)
            ->withTag($tag)
            ->withPage('tag');
    }
}
