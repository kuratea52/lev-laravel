@section('title', 'トップ')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                みんなの旅日記
            </h2>
            @auth
                <p>ログインユーザー名: {{ auth()->user()->name }}</p>
            @endauth
    </x-slot>

    <div class="container mx-auto my-8 max-w-7xl sm:px-6 lg:px-8">
        <!-- 検索バー -->
        <div class="mb-8 flex justify-end">
            <input type="text" id="searchInput" class="border-gray-300 border rounded-md p-2" placeholder="Search...">
            <button onclick="searchPosts()" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md">Search</button>
        </div>
        
        <!-- 総合ランキング -->
        <h2 class="text-2xl font-semibold mb-2 text-yellow-500">総合ランキング</h2>
        @include('layouts.total_likes_ranking', ['totalLikesRanking' => $totalLikesRanking])

        <!-- 関東地方のランキング -->
        <div class="mb-4"></div>
        <h2 class="text-2xl font-semibold mb-2 text-blue-500">関東地方のランキング</h2>
        @include('layouts.kanto_ranking', ['kantoRanking' => $kantoRanking])

        <!-- 春のランキング -->
        <h2 class="text-2xl font-semibold mb-2 text-green-500">春のランキング</h2>
        <ul class="list-disc pl-6">
            @foreach($springRanking as $post)
                <li>
                    <a href="/posts/{{ $post->id }}" class="hover:underline">
                        {{ $post->title }} - Likes: {{ $post->likes }}
                    </a>
                </li>
            @endforeach
        </ul>
        
        <!-- ひとり旅の数ランキング -->
        <h2 class="text-2xl font-semibold mb-2 text-purple-500">ひとり旅のランキング</h2>
        <ul class="list-disc pl-6">
            @foreach($oneParticipantLikesRanking as $post)
                <li>
                    <a href="/posts/{{ $post->id }}" class="hover:underline">
                        {{ $post->title }} - Likes: {{ $post->likes }}
                    </a>
                </li>
            @endforeach
        </ul>
        
        <!-- 予算３万円以内のランキング -->
        <h2 class="text-2xl font-semibold mb-2 text-red-500">予算３万円以内のランキング</h2>
        <ul class="list-disc pl-6">
            @foreach($budgetLikesRanking as $post)
                <li>
                    <a href="/posts/{{ $post->id }}" class="hover:underline">
                        {{ $post->title }} - Likes: {{ $post->likes }}
                    </a>
                </li>
            @endforeach
        </ul>
        
        <!-- 日帰り旅のランキング -->
        <h2 class="text-2xl font-semibold mb-2 text-indigo-500">日帰り旅のランキング</h2>
        <ul class="list-disc pl-6">
            @foreach($dayTripLikesRanking as $post)
                <li>
                    <a href="/posts/{{ $post->id }}" class="hover:underline">
                        {{ $post->title }} - Likes: {{ $post->likes }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    
    <x-footer />

    @vite('resources/js/search.js')
</x-app-layout>