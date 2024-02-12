<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}の詳細
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
                <p><strong>公開:</strong> {{ $post->is_public == 1 ? 'はい' : 'いいえ' }}</p>
                <p><strong>いいね数:</strong> <span id="likeCount">{{ $post->likes }}</span></p>
                <p><strong>作成日時:</strong> {{ $post->created_at }}</p>
                <p><strong>更新日時:</strong> {{ $post->updated_at }}</p>
            </div>
            <div class="content">
                <div class="content__post mb-4">
                    <h3 class="text-xl font-semibold mb-2">本文</h3>
                    <p class="text-gray-700">{{ $post->content }}</p>
                </div>
            </div>
            @auth <!-- ログインしている場合のみ表示 -->
                @if (auth()->user()->id === $post->user_id) <!-- ログインユーザーが投稿者である場合のみ表示 -->
                <div class="text-center mt-4">
                    <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:underline">修正</a>
                </div>
                @endif
                <div class="text-center mt-4">
                    <!-- いいね機能の追加 -->
                    <form id="likeForm" method="POST" action="{{ route('posts.like', $post->id) }}">
                        @csrf
                        <button type="submit" class="text-blue-500 hover:underline">いいね</button>
                    </form>
                    <!-- コメント機能の追加（コメント機能が実装されていればここに追加する） -->
                </div>
            @endauth
        </div>
        <div class="footer text-center mt-4">
            <a href="/" class="text-blue-500 hover:underline">戻る</a>
        </div>
    </div>

    <script>
        // いいねフォームのサブミットを処理するJavaScriptコード
        document.getElementById('likeForm').addEventListener('submit', async function(event) {
            event.preventDefault(); // デフォルトのフォームの送信をキャンセル
                    
            const formData = new FormData(this); // フォームデータを取得
            
            try {
                const response = await fetch(this.action, {
                    method: this.method,
                    body: formData
                });
        
                if (!response.ok) {
                    throw new Error('いいねの追加に失敗しました。');
                }
        
                // レスポンスをJSONとして解析していいね数を取得
                const data = await response.json();
        
                // レスポンスデータを処理し、いいね数を更新
                const likeCountElement = document.getElementById('likeCount');
                if (likeCountElement) {
                    likeCountElement.textContent = data.likes; // 新しいいいね数を表示
                }
            } catch (error) {
                console.error('エラー:', error);
            }
        });
    </script>
</x-app-layout>