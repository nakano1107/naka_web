<!DOCTYPE HTML>
<html lang="ja">
    <x-app-layout>
        <body>
            <a href="/posts/create">[投稿作成]</a>
            <div class='search'>
              <form action="/posts/search" method="GET">
                @csrf
                <input type="text" name="keyword" value="{{ old('keyword') }}"/>
                <input type="submit" value="検索"/>
              </form>
            @if (isset($keyword))
                <h2>検索ワード：{{ $keyword }}</h2>
            @endif
            </div>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post m-3 p-3 bg-gray-400'>
                        <a href="/posts/{{ $post->id }}"><h2 class='title'>タイトル：{{ $post->title }}</h2></a>
                        <a href="/users/{{ $post->user_id }}"><h3 class='user'>ユーザー：{{ $post->user->name }}</h3></a>
                        <p class='body'>内容：{{ $post->body }}</p>
                        <p>
                        @foreach ($post->tags as $tag)
                            <a href="/tags/{{ $tag->id }}">#{{ $tag->name }}</a>
                        @endforeach
                        </p>
                    </div>
                @endforeach
            </div>
            <div class='paginate'>
                {{ $posts->appends(request()->query())->links() }} 
            </div>

            <p>ログインユーザー：{{ Auth::user()->name }}</p>
        </body>
    </x-app-layout>
</html>
