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
            $posts = $user->likes()->paginate();
        } else {
            $posts = $user->posts()->paginate();
        }

        return view('profile')
            ->withUser($user)
            ->withPosts($posts);
    }
}
