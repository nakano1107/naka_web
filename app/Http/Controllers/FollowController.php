<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
use App\Models\User;

class FollowController extends Controller
{
    public function follow(User $user)
    {
        $follow = new Follow;
        $follow->follow_id = Auth::id();
        $follow->followee_id = $user->id;
        $follow->save();
        return redirect('/users/'.$user->id);
    }
    
    public function unfollow(User $user)
    {
        $follow_id = Auth::id();
        $followee_id = $user->id;
        Follow::where('follow_id', $follow_id)->where('followee_id', $followee_id)->delete();
    
        return redirect('/users/'.$user->id);
    }
}

