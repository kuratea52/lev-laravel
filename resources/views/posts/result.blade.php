<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            検索結果
        </h2>
    </x-slot>

    <div class="container mx-auto my-8">
        <!-- 検索結果の表示 -->
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($searchResults as $post)
                <div class="bg-white shadow-sm rounded-lg p-4">
                    <h3 class="text-lg font-semibold mb-2">{{ $post->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 200) }}</p>
                    <div class="flex justify-between">
                        <span class="text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                        <span class="text-gray-500">{{ $post->likes }} Likes</span>
                    </div>
                    <div class="mt-2">
                        <span class="text-gray-500">地域: {{ $post->region }}</span><br>
                        <span class="text-gray-500">シーズン: {{ $post->season }}</span><br>
                        <span class="text-gray-500">参加人数: {{ $post->participants }}</span><br>
                        <span class="text-gray-500">予算: {{ $post->budget }}</span><br>
                        <span class="text-gray-500">滞在期間: {{ $post->stay_duration }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>