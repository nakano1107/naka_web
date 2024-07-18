<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userProfile(User $user)
    {
        $follow_id = Auth::id();
        $followee_id = $user->id;
        $posts = $user->posts()->orderBy('updated_at', 'DESC')->get();
        // 既にフォローしているかによって表示を変化させるためのフラッグ$whetherFollow
        $whetherFollow = Follow::where('follow_id', $follow_id)->where('followee_id', $followee_id)->exists();
        return view('users.userProfile')->with([
            'user'=>$user,
            'whetherFollow'=>$whetherFollow,
            'posts'=>$posts,
        ]);
    }
}

