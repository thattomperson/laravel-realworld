<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request, $userId)
    {
        $user = User::find($userId);

        if ($request->has('favourites')) {
            $articles = $user->likes()->paginate();
        } else {
            $articles = $user->articles()->paginate();
        }

        return view('profile')
            ->withUser($user)
            ->withArticles($articles);
    }
}
