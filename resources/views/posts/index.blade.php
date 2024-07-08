<!DOCTYPE HTML>
<html lang="ja">
    <x-app-layout>
        <body>
            <h1>Blog Name</h1>
            <a href="/posts/create">投稿作成</a>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <a href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                        <a href="/users/{{ $post->user->id }}"><h2 class='title'>{{ $post->user->name }}</h2></a>
                        <p class='body'>{{ $post->body }}</p>
                    </div>
                @endforeach
            </div>
            <div class='paginate'>
                {{ $posts->links() }}
            </div>

            <p>ログインユーザー:{{ Auth::user()->name }}</p>
        </body>
    </x-app-layout>
</html>
