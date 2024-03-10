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
        <div class="mb-4"></div>
        <h2 class="text-2xl font-semibold mb-2 text-pink-500">春のランキング</h2>
        @include('layouts.spring_ranking', ['springRanking' => $springRanking])

        <!-- ひとり旅のランキング -->
        <div class="mb-4"></div>
        <h2 class="text-2xl font-semibold mb-2 text-green-500">ひとり旅のランキング</h2>
        @include('layouts.one_participant_likes_ranking', ['oneParticipantLikesRanking' => $oneParticipantLikesRanking])

        <!-- 予算３万円以内のランキング -->
        <div class="mb-4"></div>
        <h2 class="text-2xl font-semibold mb-2 text-red-500">予算３万円以内のランキング</h2>
        @include('layouts.budget_likes_ranking', ['budgetLikesRanking' => $budgetLikesRanking])

        <!-- 日帰り旅のランキング -->
        <div class="mb-4"></div>
        <h2 class="text-2xl font-semibold mb-2 text-indigo-500">日帰り旅のランキング</h2>
        @include('layouts.day_trip_likes_ranking', ['dayTripLikesRanking' => $dayTripLikesRanking])
    </div>
    
    <x-footer />

    @vite('resources/js/search.js')
</x-app-layout>