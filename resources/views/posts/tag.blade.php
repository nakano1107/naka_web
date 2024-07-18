<!DOCTYPE HTML>
<html lang="ja">
    <x-app-layout>
        <body>
            <h2>#{{ $tag->name }}</h2>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post m-3 p-3 bg-gray-400'>
                        <a href="/posts/{{ $post->id }}"><h2 class='title'>タイトル：{{ $post->title }}</h2></a>
                        <a href="/users/{{ $post->user_id }}"><h3 class='user'>ユーザー：{{ $post->user->name }}</h3></a>
                        <p class='body'>内容：{{ $post->body }}</p>
                    </div>
                @endforeach
            </div>
            <p>ログインユーザー:{{ Auth::user()->name }}</p>
        </body>
    </x-app-layout>
</html>
