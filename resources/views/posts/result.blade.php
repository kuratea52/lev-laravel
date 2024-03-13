@section('title', '「' . $keyword . '」の検索結果')

<x-app-layout>
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    </head>
    
    <x-slot name="header">
        <div class="flex justify-between items-center mt-16">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                「{{ $keyword }}」の検索結果
            </h2>
        </div>
    </x-slot>
    
    <div class="container mx-auto my-8 max-w-7xl sm:px-6 lg:px-8">
        <!-- トップページへのリンクと検索バー -->
        <div class="flex justify-between items-center">
            <div class="mb-4">
                <a href="{{ route('index') }}" class="text-blue-500 hover:underline">トップページへ戻る</a>
            </div>
            <div class="mb-8 flex justify-end">
                <input type="text" id="searchInput" class="border-gray-300 border rounded-md p-2" placeholder="地域・季節・人数">
                <button onclick="searchPosts()" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        <div class="container mx-auto my-8">
            <!-- 検索結果の表示 -->
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 mx-auto">
                @foreach($searchResults as $post)
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
        @include('layouts.resultPagination', ['paginator' => $searchResults])
    </div>
    
    <x-footer />
    
    @vite('resources/js/search.js')
</x-app-layout>
