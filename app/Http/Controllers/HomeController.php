<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function show(Request $request)
    {
        $data = [
            'tags' => Tag::all(),
        ];

        if ($request->has('feed')) {
            // my "feed"
            // only works with logged in users
            if (Auth::guest()) {
                // redirect to the "normal" page if they aren't logged in 
                return redirect(route('home'));
            }

            // Now grab all articles I've liked or authored by people I follow
            $data['articles'] = Article::whereHas('likes', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->orWhereHas('author.followers', function ($query) {
                $query->where('follower_id', Auth::user()->id);
            })->paginate();

            $data['page'] = 'feed';
        } else if ($request->has('tag')) {
            // we requested a specific tag
            // grab it and find all articles with that tag

            $tag = Tag::find($request->get('tag'));

            $data['articles'] = Article::whereHas('tags', function ($query) use ($tag) {
                $query->where('tags.id', $tag->id);
            })->paginate();

            $data['tag'] = $tag;
            $data['page'] = 'tag';
        } else {
            // normal page
            // just get all the articles 

            $data['articles'] = Article::paginate();
            $data['page'] = 'global';
        }

        return view('home')->with($data);
    }
}
