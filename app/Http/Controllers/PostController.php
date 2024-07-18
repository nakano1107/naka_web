<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with([
            'posts'=>$post->getPaginateByLimit(),
        ]);
    }
    
    public function show(Post $post)
    {
        $tags = $post->tags()->get();
        return view('posts.show')->with([
            'post'=>$post,
            'tags'=>$tags,
        ]);
    }
    
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post['user_id'] = Auth::id();
        $post->fill($input_post)->save();
        
        $input_tag = $request['tag'];
        $tags = explode(',', $input_tag);
        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $post->tags()->attach($tag->id);
        }
        
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        $tags = $post->tags()->get();
        return view('posts.edit')->with([
            'post'=>$post,
            'tags'=>$tags,
        ]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/'.$post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}

