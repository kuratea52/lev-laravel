<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}の詳細
        </h2>
    </x-slot>
    
    <div class="container mx-auto my-8">
        <div class="post-details">
            <h1 class="title">{{ $post->title }}</h1>
            <div class="details">
                <p><strong>地域:</strong> {{ $post->region }}</p>
                <p><strong>季節:</strong> {{ $post->season }}</p>
                <p><strong>参加者数:</strong> {{ $post->participants }}</p>
                <p><strong>予算:</strong> {{ $post->budget }}</p>
                <p><strong>滞在期間:</strong> {{ $post->stay_duration }}</p>
                <p><strong>公開:</strong> {{ $post->is_public ? 'はい' : 'いいえ' }}</p>
                <p><strong>いいね数:</strong> {{ $post->likes }}</p>
                <p><strong>作成日時:</strong> {{ $post->created_at }}</p>
                <p><strong>更新日時:</strong> {{ $post->updated_at }}</p>
            </div>
            <div class="content">
                <div class="content__post">
                    <h3>本文</h3>
                    <p>{{ $post->content }}</p>
                </div>
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </div>
</x-app-layout>