<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}の詳細
        </h2>
    </x-slot>
    
    <h1 class="title">{{ $post->title }}</h1>
    <div class="edit">
        <a href="/posts/{{ $post->id }}/edit">[edit]</a>
    </div>
    <div class="content">
        <div class="content__post">
            <h3>本文</h3>
            <p>{{ $post->body }}</p>    
        </div>
    </div>
    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
</x-app-layout>