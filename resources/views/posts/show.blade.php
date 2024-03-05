@section('title', '旅日記「' . $post->title . '」')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            旅日記「{{ $post->title }}」の詳細
        </h2>
    </x-slot>
    
    <div class="container mx-auto my-8">
        <div class="post-details bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="title text-3xl mb-4 font-semibold">{{ $post->title }}</h1>
            <div class="details grid grid-cols-2 gap-4 mb-4">
                <p><strong>地域:</strong> {{ $post->region }}</p>
                <p><strong>季節:</strong> {{ $post->season }}</p>
                <p><strong>参加者数:</strong> {{ $post->participants }}</p>
                <p><strong>予算:</strong> {{ $post->budget }}</p>
                <p><strong>滞在期間:</strong> {{ $post->stay_duration }}</p>
                <div class="image-section grid grid-cols-3 gap-4">
                    @for ($i = 1; $i <= 3; $i++)
                        @if (!empty($post["image_path_$i"]))
                            <img src="{{ asset($post["image_path_$i"]) }}" alt="Image {{ $i }}">
                        @endif
                    @endfor
                </div>
                @auth
                    @if (auth()->user()->id === $post->user_id)
                        <p><strong>公開:</strong> {{ $post->is_public == 1 ? 'はい' : 'いいえ' }}</p>
                    @endif
                @endauth
                <p><strong>いいね数:</strong> <span id="likeCount">{{ $post->likes }}</span></p>
                <p><strong>作成日時:</strong> {{ $post->created_at }}</p>
                <p><strong>更新日時:</strong> {{ $post->updated_at }}</p>
                
                <!-- 行った場所と感想 -->
                <div class="mb-4">
                    <h3 class="text-xl font-semibold mb-2">行った場所と感想</h3>
                    <ul>
                        @for ($i = 1; $i <= 20; $i++)
                            @if (!empty($post["place_visited_$i"]) && !empty($post["impressions_$i"]))
                                <li>
                                    <strong>行った場所{{ $i }}:</strong> {{ $post["place_visited_$i"] }}<br>
                                    <strong>感想{{ $i }}:</strong> {{ $post["impressions_$i"] }}
                                </li>
                            @endif
                        @endfor
                    </ul>
                </div>
            </div>
            
            <div class="content">
                <div class="content__post mb-4">
                    <h3 class="text-xl font-semibold mb-2">本文</h3>
                    <p class="text-gray-700">{{ $post->content }}</p>
                </div>
            </div>
            
            @auth <!-- ログインしている場合のみ表示 -->
                @if (auth()->user()->id === $post->user_id) <!-- ログインユーザーが投稿者の場合 -->
                <div class="text-center mt-4">
                    <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:underline">修正する</a>
                    <button onclick="confirmDelete()" class="text-red-500 hover:underline mr-4">削除する</button>
                    <form id="deleteForm" method="POST" action="{{ route('posts.delete', $post->id) }}" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                @else <!-- ログインユーザーが投稿者でない場合 -->
                <div class="text-center mt-4">
                    <!-- いいね機能の追加 -->
                    <form id="likeForm" method="POST" action="{{ route('posts.like', $post->id) }}">
                        @csrf
                        <button id="likeButton" type="submit" class="text-blue-500 hover:underline" data-post-id="{{ $post->id }}">いいね</button>
                    </form>
                    <form id="unlikeForm" method="POST" action="{{ route('posts.unlike', $post->id) }}">
                        @csrf
                        <button hidden id="unlikeButton" type="submit" class="text-blue-500 hover:underline">いいね取り消し</button>
                    </form>
                    <!-- コメント機能の追加 -->
                    <form method="POST" action="{{ route('posts.comment', $post->id) }}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea name="content" class="w-full px-3 py-2 border rounded-lg" placeholder="コメントを入力してください"></textarea>
                        <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">コメントする</button>
                    </form>
                </div>
                @endif
            @endauth
            
            <div class="comments mt-4">
                <h3 class="text-xl font-semibold mb-2">コメント一覧</h3>
                @foreach ($comments as $comment)
                    <div class="comment">
                        <p><strong>投稿者:</strong> {{ $comment->user->name }}</p>
                        <p><strong>内容:</strong> {{ $comment->content }}</p>
                        <p><strong>投稿日時:</strong> {{ $comment->created_at }}</p>
                    </div>
                @endforeach
                <!-- ページネーション -->
                @include('layouts.showPagination', ['paginator' => $comments])
            </div>
        </div>
        @if ($searchKeyword) <!-- 検索結果からの遷移の場合のみ表示 -->
        <div class="footer text-center mt-4">
            <a href="{{ route('posts.result', ['keyword' => $searchKeyword]) }}" class="text-blue-500 hover:underline">検索結果一覧へ</a>
        </div>
        @endif
        <div class="footer text-center mt-4">
            <a href="/" class="text-blue-500 hover:underline">トップへ戻る</a>
        </div>
    </div>
    
    @vite('resources/js/deleteConfirmation.js')
    @vite('resources/js/like1.js')
    @vite('resources/js/like2.js')
</x-app-layout>