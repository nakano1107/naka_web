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
                                
                                {{-- <a>で書いた場合
                                The GET method is not supported for route users/2/unfollow.
                                Supported methods: DELETE.
                                と言われるんだけどどうすればいい？
                                <a href="/users/{{ $user->id }}/unfollow">フォローを外す</a>--}}
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
            @foreach ($user->posts as $post)
                <a href="/posts/{{ $post->id }}"><h2 class='title'>タイトル：{{ $post->title }}</h2></a>
                <p>本文：{{ $post->body }}</p>
            @endforeach
            <a href="/">[全体投稿一覧へ]</a>
            </div>
        </body>
    </x-app-layout>
</html>