<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function tagList(Tag $tag)
    {
        $posts = $tag->posts()->orderBy('updated_at', 'DESC')->get();
        return view('posts.tag')->with([
            'tag'=>$tag,
            'posts'=>$posts,
        ]);
    }
}

