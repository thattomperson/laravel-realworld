<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($articleId)
    {
        $article = Article::find($articleId);
        $followerCount = $article->author->followers()->count();
        $likeCount = $article->likes()->count();

        return view('article.show')->with(compact('article', 'followerCount', 'likeCount'));
    }
}
