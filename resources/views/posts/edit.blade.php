<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <head>
            <meta charset="utf-8">
            <title>投稿</title>
        </head>
        <body>
            <h1 class="title">編集画面</h1>
            <div class="content">
                <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class='content__title'>
                        <h2>タイトル</h2>
                        <input type='text' name='post[title]' value="{{ $post->title }}">
                    </div>
                    <div class='content__body'>
                        <h2>内容</h2>
                        <input type='text' name='post[body]' value="{{ $post->body }}">
                    </div>
                    <div class="content__tag">
                        <h2>タグ</h2>
                        @foreach($tags as $tag)
                            <input type='text' name='tag' value="{{ $tag->name }}">
                        @endforeach
                    </div>
                    <input type="submit" value="保存">
                </form>
            </div>
        </body>
    </x-app-layout>
</html>