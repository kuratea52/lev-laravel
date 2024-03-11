@section('title', 'このサイトについて')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center mt-16">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('みんなの旅日記とは') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <h3 class="text-2xl font-semibold mb-4">みんなの旅日記の機能</h3>
                <ul class="list-disc pl-6 mb-6">
                    <li>投稿する</li>
                    <li>検索する</li>
                    <li>備忘録として使う</li>
                </ul>
                <p class="text-lg">当サイトは旅の記録を共有し、他の人が旅行の計画を立てるのに役立つプラットフォームです。</p>
                <p class="text-lg">地域や季節などの条件を指定して投稿を検索し、興味深い旅の記録を見つけることができます。</p>
                <p class="text-lg">また、自分の投稿を非公開にすることで、他のユーザーに表示されず、個人的な旅行の備忘録として利用することもできます。</p>
            </div>
        </div>
    </div>
    
    <x-footer />
    
</x-app-layout>