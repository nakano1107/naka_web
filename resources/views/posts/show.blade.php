<!DOCTYPE HTML>
<html lang="ja">
    <x-app-layout>
        <body>
            <div class='post m-3 p-3 bg-gray-400'>
                <h1 class="title">タイトル：{{ $post->title }}</h1>
                <a href="/users/{{ $post->user_id }}"><h3 class='user'>ユーザー：{{ $post->user->name }}</h3></a>
                <div class="content">
                    <p>内容：{{ $post->body }}</p>    
                </div>
                <div class="tag">
                    <p>
                        @foreach ($tags as $tag)
                            <a href="/tags/{{ $tag->id }}"><span>#{{ $tag->name }}</span></a>
                        @endforeach
                    </p>
                </div>
            </div>
            <div class="footer">
                @if( Auth::check() && $post->user_id == Auth::user()->id)
                    <div class="edit">
                        <a href="/posts/{{ $post->id }}/edit">[編集]</a>
                    </div>
                    <div class="delete">  
                        <form action="/posts/{{ $post->id }}/delete" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deletePost({{ $post->id }})">[削除]</button>
                        </form>
                        <script>
                            function deletePost(id){
                                'use strict'
                                
                                if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                                    document.getElementById(`form_${id}`).submit();
                                   }                
                            }
                        </script>
                    </div> 
                @endif
                <a href="/">[全体投稿一覧へ]</a>
            </div>
            <p>ログインユーザー：{{ Auth::user()->name }}</p>
        </body>
    </x-app-layout>
</html>