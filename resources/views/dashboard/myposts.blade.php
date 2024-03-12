@section('title', auth()->user()->name . 'さんの旅日記')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center mt-16">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __(auth()->user()->name . 'さんの旅日記一覧') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="container mx-auto my-8 max-w-7xl sm:px-6 lg:px-8">
        <div class="container mx-auto my-8">
            <!-- 投稿一覧の表示 -->
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 mx-auto">
                @foreach($posts as $post)
                    <a href="{{ route('posts.show', $post->id) }}" class="block relative bg-white rounded-lg p-4 hover:shadow-md transition duration-300"
                        style="background-image: url('{{ $post->image_path_1 ? asset($post->image_path_1) : asset('storage/img/no_image.jpeg') }}');
                               background-size: cover;
                               background-position: center;
                               box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"
                    >
                        <div class="absolute inset-0 bg-black opacity-25 rounded-lg backdrop-filter backdrop-blur-lg"></div>
                        <h3 class="text-xl mb-4 font-semibold bg-white opacity-75 backdrop-filter backdrop-blur-sm p-2 rounded">{{ Str::limit($post->title, 20) }}</h3>
                        <p class="text-gray-900 mb-4 font-semibold bg-white opacity-75 backdrop-filter backdrop-blur-sm p-2 rounded">{{ Str::limit($post->content, 40) }}</p>
                        <div class="flex justify-between font-semibold bg-white opacity-75 backdrop-filter backdrop-blur-sm p-2 rounded">
                            <span class="text-gray-900">{{ $post->created_at->diffForHumans() }}</span>
                            <span class="text-gray-900">{{ $post->likes }} Likes</span>
                        </div>
                        <div class="mt-2 font-semibold bg-white opacity-75 backdrop-filter backdrop-blur-sm p-2 rounded">
                            <span class="text-gray-900">地域: {{ $post->region }}</span><br>
                            <span class="text-gray-900">シーズン: {{ $post->season }}</span><br>
                            <span class="text-gray-900">参加人数: {{ $post->participants }}</span><br>
                            <span class="text-gray-900">予算: {{ $post->budget }}</span><br>
                            <span class="text-gray-900">滞在期間: {{ $post->stay_duration }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        
        <!-- ページネーション -->
        @include('layouts.mypostsPagination', ['paginator' => $posts])
    </div>

    <x-footer />
    
</x-app-layout>