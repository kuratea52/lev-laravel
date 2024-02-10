<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">{{ __("Your Posts") }}</h1>
                    <ul>
                        @foreach($posts as $post)
                            <li>{{ $post->title }}</li>
                            <!-- 他の投稿情報も表示する場合はここに追加 -->
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>