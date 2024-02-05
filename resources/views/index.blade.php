<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Index
        </h2>
    </x-slot>
    
    <head>
        <link rel="stylesheet" href="{{ asset('../css/index.css') }}">
    </head>

    <div class="container mx-auto my-8">
        <!-- 関東地方のランキング -->
        <h2 class="text-2xl font-semibold mb-2 text-blue-500">関東地方のランキング</h2>
        <ul class="list-disc pl-6">
            @foreach($kantoRanking as $post)
                <li>{{ $post->title }} - Likes: {{ $post->likes }}</li>
            @endforeach
        </ul>
        
        <!-- 春のランキング -->
        <h2 class="text-2xl font-semibold mb-2 text-green-500">春のランキング</h2>
        <ul class="list-disc pl-6">
            @foreach($springRanking as $post)
                <li>{{ $post->title }} - Likes: {{ $post->likes }}</li>
            @endforeach
        </ul>

        <div class='posts mt-8'>
            @foreach ($posts as $post)
                <div class='post border rounded p-4 mb-4 bg-blue-100'>
                    <h2 class='text-2xl font-semibold mb-2'>
                        <a href="/posts/{{ $post->id }}" class="text-blue-500 hover:underline">{{ $post->title }}</a>
                    </h2>
                    <p class='text-gray-700'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class='paginate mt-8'>
            {{ $posts->links() }}
        </div>

        <p class='user mt-4'>Logged in as: {{ Auth::user()->name }}</p>
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