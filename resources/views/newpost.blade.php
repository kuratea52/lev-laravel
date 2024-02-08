<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('旅日記を投稿する') }}
        </h2>
    </x-slot>

    <div class="container mx-auto my-8">
        <form method="POST" action="{{ route('store') }}" class="max-w-2xl mx-auto">
            @csrf

            <!-- Region -->
            <div class="mt-4">
                <label for="region" :value="__('地域')" />
                <select name="region" id="region" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach(['北海道', '東北', '関東', '中部', '近畿', '中国', '四国', '九州', '沖縄'] as $region)
                        <option value="{{ $region }}">{{ $region }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Season -->
            <div class="mt-4">
                <label for="season" :value="__('季節')" />
                <select name="season" id="season" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="春">春</option>
                    <option value="夏">夏</option>
                    <option value="秋">秋</option>
                    <option value="冬">冬</option>
                </select>
            </div>

            <!-- Participants -->
            <div class="mt-4">
                <label for="participants" :value="__('参加人数')" />
                <select name="participants" id="participants" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="１人">１人</option>
                    <option value="２人">２人</option>
                    <option value="３～５人">３～５人</option>
                    <option value="６人～">６人～</option>
                </select>
            </div>

            <!-- Budget -->
            <div class="mt-4">
                <label for="budget" :value="__('予算')" />
                <select name="budget" id="budget" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="～１万円">～１万円</option>
                    <option value="～３万円">～３万円</option>
                    <option value="～５万円">～５万円</option>
                    <option value="～１０万円">～１０万円</option>
                    <option value="１０万円～">１０万円～</option>
                </select>
            </div>

            <!-- Stay Duration -->
            <div class="mt-4">
                <label for="stay_duration" :value="__('滞在期間')" />
                <select name="stay_duration" id="stay_duration" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="日帰り">日帰り</option>
                    <option value="１泊">１泊</option>
                    <option value="２泊">２泊</option>
                    <option value="３泊">３泊</option>
                    <option value="４泊～">４泊～</option>
                </select>
            </div>

            <!-- Title -->
            <div class="mt-4">
                <label for="title" :value="__('タイトル')" />
                <input id="title" class="block mt-1 w-full" type="text" name="title" required />
            </div>

            <!-- Content -->
            <div class="mt-4">
                <label for="content" :value="__('内容')" />
                <textarea id="content" name="content" rows="5" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button>
                    {{ __('投稿する') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>