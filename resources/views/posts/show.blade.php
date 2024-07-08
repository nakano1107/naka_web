<!DOCTYPE HTML>
<html lang="ja">
    <x-app-layout>
        <body>
            <h1 class="title">
                {{ $post->title }}
            </h1>
            <div class="content">
                <div class="content__post">
                    <h3>本文</h3>
                    <p>{{ $post->body }}</p>    
                </div>
            </div>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
            <div class="edit">
                <a href="/posts/{{ $post->id }}/edit">編集</a>
            </div>
                <form action="/posts/{{ $post->id }}/delete" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">削除</button>
                </form>
            <script>
                function deletePost(id){
                    'use strict'
                    
                    if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                        document.getElementById(`form_${id}`).submit();
                    }                
                    
                }
            </script>
        </body>
    </x-app-layout>
</html>