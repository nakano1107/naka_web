<!DOCTYPE HTML>
<html lang="ja">
    <x-app-layout>
        <body>
            <h1>投稿作成</h1>
            <form action="/posts" method="POST">
                @csrf
                <div class="title">
                    <h2>タイトル</h2>
                    <input type="text" name="post[title]" value="{{ old('post.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                <div class="body">
                    <h2>内容</h2>
                    <textarea name="post[body]">{{ old('post.body') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <div class="tag">
                    <h2>タグ</h2>
                    <input type="text" name="tag" placeholder="タグは入力しなくても構いません。" value="{{ old('tag.name') }}">
                    <p class="tag__error" style="color:red">{{ $errors->first('tag.name') }}</p>
                </div>
                <input type="submit" value="[投稿]"/>
            </form>
            <div class="back"><a href="/">[戻る]</a></div>
        </body>
    </x-app-layout>
</html>