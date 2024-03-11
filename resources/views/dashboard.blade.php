@section('title', 'ホーム')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center mt-16">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('ホーム') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- ユーザー情報 -->
                    <div class="flex items-center mb-4">
                        <div class="mr-4">
                            <!-- プロフィール画像 -->
                            <img class="h-12 w-12 rounded-full object-cover" src="{{ Auth::user()->profile_image_url }}" alt="プロフィール画像">
                        </div>
                        <div>
                            <!-- ユーザー名 -->
                            <h1 class="text-xl font-semibold">{{ Auth::user()->name }}</h1>
                            <!-- 投稿の数 -->
                            <p>投稿数: {{ Auth::user()->posts()->count() }}</p>
                            <!-- もらったいいねの数 -->
                            <p>もらったいいね数: {{ Auth::user()->receivedLikes()->count() }}</p>
                        </div>
                    </div>

                    <!-- プロフィール画像を変更するリンク -->
                    <div class="mb-4">
                        <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline">{{ __('プロフィール画像を変更する') }}</a>
                    </div>

                    <!-- 自分の投稿一覧 -->
                    <div class="mb-4">
                        <h2 class="text-lg font-semibold mb-2">{{ __('投稿一覧') }}</h2>
                        <ul>
                            @foreach(Auth::user()->posts as $post)
                                <li>{{ $post->title }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- いいねした投稿一覧 -->

                    <!-- アカウント設定へのリンク -->
                    <div>
                        <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline">{{ __('アカウント設定') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <x-footer />
    
</x-app-layout>
