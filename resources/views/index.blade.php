<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ホーム
        </h2>
    </x-slot>
    
    <head>
        <link rel="stylesheet" href="{{ asset('../css/index.css') }}">
    </head>

    <div class="container mx-auto my-8">
        <!-- Search Bar -->
        <div class="mb-8 flex justify-end">
            <input type="text" id="searchInput" class="border-gray-300 border rounded-md p-2" placeholder="Search...">
            <button onclick="searchPosts()" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md">Search</button>
        </div>
        
        <!-- 総合ランキング -->
        <h2 class="text-2xl font-semibold mb-2 text-yellow-500">総合ランキング</h2>
        <ul class="list-disc pl-6">
            @foreach($totalLikesRanking as $post)
                <li>
                    <a href="/posts/{{ $post->id }}" class="hover:underline">
                        {{ $post->title }} - Likes: {{ $post->likes }}
                    </a>
                </li>
            @endforeach
        </ul>
        
        <!-- 関東地方のランキング -->
        <h2 class="text-2xl font-semibold mb-2 text-blue-500">関東地方のランキング</h2>
        <ul class="list-disc pl-6">
            @foreach($kantoRanking as $post)
                <li>
                    <a href="/posts/{{ $post->id }}" class="hover:underline">
                        {{ $post->title }} - Likes: {{ $post->likes }}
                    </a>
                </li>
            @endforeach
        </ul>
        
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

        <!--<div class='posts mt-8'>-->
        <!--    @foreach ($posts as $post)-->
        <!--        <div class='post border rounded p-4 mb-4 bg-blue-100'>-->
        <!--            <h2 class='text-2xl font-semibold mb-2'>-->
        <!--                <a href="/posts/{{ $post->id }}" class="text-blue-500 hover:underline">{{ $post->title }}</a>-->
        <!--            </h2>-->
        <!--            <p class='text-gray-700'>{{ $post->body }}</p>-->
        <!--            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" class="mt-2">-->
        <!--                @csrf-->
        <!--                @method('DELETE')-->
        <!--                <button type="button" onclick="deletePost({{ $post->id }})" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>-->
        <!--            </form>-->
        <!--        </div>-->
        <!--    @endforeach-->
        <!--</div>-->

        <!--<div class='paginate mt-8'>-->
        <!--    {{-- $posts->links() --}}-->
        <!--</div>-->

    </div>

    <script>
        function deletePost(id) {
            'use strict'
            if (confirm('Are you sure you want to delete this post?')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>