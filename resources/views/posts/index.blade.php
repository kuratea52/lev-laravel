<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <a href='/posts/create'>[create]</a>
        <div class='posts'>
            <!-- $postsに含まれる値を反復処理 -->
            @foreach ($posts as $post)
            <div class='post'>
                <!-- bladeファイル内で変数を扱う場合は{\{ $変数名 }}という形で記載 -->
                <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                <p class='body'>{{ $post->body }}</p>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                </form>
            </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <script>
        function deletePost(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
        </script>
    </body>
</html>