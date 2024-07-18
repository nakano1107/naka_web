<!DOCTYPE HTML>
<html lang="ja">
    <x-app-layout>
        <body>
            <div class='user'>
                <h1>{{ $user->name }} のプロフィール</h1>
                    <!-- 自分のプロフィールでない時にフォローボタンを追加 -->
                    @if (Auth::user()->id != $user->id)
                        @if ($whetherFollow)
                            <div class="unfollow">
                                <form action="/users/{{ $user->id }}/unfollow" id="form_{{ $user->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">フォローを外す</button> 
                                </form>
                            </div>
                        @else
                            <div class="follow">
                                    <a href="/users/{{ $user->id }}/follow">フォローする</a>
                            </div>
                        @endif
                    @endif
                <p>【{{ $user->name }}の投稿】</p>
            </div>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post m-3 p-3 bg-gray-400'>
                        <a href="/posts/{{ $post->id }}"><h2 class='title'>タイトル：{{ $post->title }}</h2></a>
                        <p>本文：{{ $post->body }}</p>
                        <div class="tag">
                            <p>
                                @foreach ($post->tags as $tag)
                                <a href="/tags/{{ $tag->id }}"><span>#{{ $tag->name }}</span></a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                @endforeach
            <a href="/">[全体投稿一覧へ]</a>
            </div>
        </body>
    </x-app-layout>
</html>