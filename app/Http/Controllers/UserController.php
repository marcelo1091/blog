<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function profile(int $id)
    {
        $user = User::find($id);
        return view('posts.profiles')->with([
            'posts' => $user->posts()->orderBy('id', 'desc')->paginate(7),
            'user'  => $user,
        ]);
    }
}
