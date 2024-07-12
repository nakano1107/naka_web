<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userProfile(User $user)
    {
        // 既にフォローしているかによって表示を変化させるためのフラッグ$whetherFollow
        $follow_id = Auth::id();
        $followee_id = $user->id;
        $whetherFollow = Follow::where('follow_id', $follow_id)->where('followee_id', $followee_id)->exists();
        return view('users.userProfile')->with(['user'=>$user, 'whetherFollow'=>$whetherFollow]);
    }
}

