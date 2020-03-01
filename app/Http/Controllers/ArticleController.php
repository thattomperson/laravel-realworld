<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function show($articleId)
    {
        $article = Article::find($articleId);
        $followerCount = $article->author->followers()->count();
        $likeCount = $article->likes()->count();

        return view('article.show')->with(compact('article', 'followerCount', 'likeCount'));
    }

    public function like($articleId)
    {
        $article = Article::find($articleId);
        /** @var User|null $user */
        $user = Auth::user();
        if ($user) {
            $user->like($article);
            return redirect()->back();
        }

        return redirect()->back();
    }
}
