<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Index
        </h2>
    </x-slot>
    
    <h1>Blog Name</h1>
    <!--teratailの質問一覧とリンク表示-->
    <!--<div>-->
    <!--    @foreach($questions as $question)-->
    <!--        <div>-->
    <!--            <a href="https://teratail.com/questions/{{ $question['id'] }}">-->
    <!--                {{ $question['title'] }}-->
    <!--            </a>-->
    <!--        </div>-->
    <!--    @endforeach-->
    <!--</div>-->
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
            <br>
        </div>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $posts->links() }}
    </div>
    <p class='user'>ログインユーザー：{{ Auth::user()->name }}</p>
    <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
    </script>
</x-app-layout>