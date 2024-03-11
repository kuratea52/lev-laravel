@section('title', auth()->user()->name . 'さんの旅日記')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center mt-16">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __(auth()->user()->name . 'さんの旅日記一覧') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">{{ __("Your Posts") }}</h1>
                    <ul>
                        @foreach($posts as $post)
                            <li>
                                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">
                                    {{ $post->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <x-footer />
    
</x-app-layout>