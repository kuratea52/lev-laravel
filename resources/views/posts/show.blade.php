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
                @if(auth()->id() === $post->user_id)
                    <p><strong>公開:</strong> {{ $post->is_public == 1 ? 'はい' : 'いいえ' }}</p>
                @endif
                <p><strong>いいね数:</strong> {{ $post->likes }}</p>
                <p><strong>作成日時:</strong> {{ $post->created_at }}</p>
                <p><strong>更新日時:</strong> {{ $post->updated_at }}</p>
            </div>
            <div class="content">
                <div class="content__post mb-4">
                    <h3 class="text-xl font-semibold mb-2">本文</h3>
                    <p class="text-gray-700">{{ $post->content }}</p>
                </div>
            </div>
            @if(auth()->id() === $post->user_id)
                <div class="text-center mt-4">
                    <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:underline">修正</a>
                </div>
            @endif
        </div>
        <div class="footer text-center mt-4">
            <a href="/" class="text-blue-500 hover:underline">戻る</a>
        </div>
    </div>
</x-app-layout>