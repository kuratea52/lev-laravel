<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿内容') }}
        </h2>
    </x-slot>

    <div class="container mx-auto my-8">
        <div class="max-w-2xl mx-auto">
            <h3 class="text-lg font-semibold">{{ $post->title }}</h3>
            <p class="text-sm text-gray-600">{{ $post->region }} / {{ $post->season }} / {{ $post->participants }} / {{ $post->budget }} / {{ $post->stay_duration }}</p>
            <p class="mt-4">{{ $post->content }}</p>
        </div>
        <div class="footer text-center mt-4">
            <a href="/" class="text-blue-500 hover:underline">戻る</a>
        </div>
    </div>
</x-app-layout>