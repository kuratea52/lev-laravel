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
                    <h1 class="text-2xl font-bold mb-4">{{ __("Welcome to the Dashboard") }}</h1>
                    <p class="text-lg">{{ __("You're logged in!") }}</p>
                    <!-- 自分の投稿を確認するリンク -->
                    <a href="{{ route('dashboard.myposts') }}" class="text-blue-500 hover:underline">{{ __("View Your Posts") }}</a>
                </div>
            </div>
        </div>
    </div>
    
    <x-footer />
    
</x-app-layout>