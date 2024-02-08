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
                <label for="region" class="block font-medium text-gray-700">地域</label>
                <select name="region" id="region" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach(['北海道', '東北', '関東', '中部', '近畿', '中国', '四国', '九州', '沖縄'] as $region)
                        <option value="{{ $region }}">{{ $region }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Season -->
            <div class="mt-4">
                <label for="season" class="block font-medium text-gray-700">季節</label>
                <select name="season" id="season" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach(['春', '夏', '秋', '冬'] as $season)
                        <option value="{{ $season }}">{{ $season }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Participants -->
            <div class="mt-4">
                <label for="participants" class="block font-medium text-gray-700">参加人数</label>
                <select name="participants" id="participants" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach(['１人', '２人', '３～５人', '６人～'] as $participants)
                        <option value="{{ $participants }}">{{ $participants }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Budget -->
            <div class="mt-4">
                <label for="budget" class="block font-medium text-gray-700">予算</label>
                <select name="budget" id="budget" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach(['～１万円', '～３万円', '～５万円', '～１０万円', '１０万円～'] as $budget)
                        <option value="{{ $budget }}">{{ $budget }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Stay Duration -->
            <div class="mt-4">
                <label for="stay_duration" class="block font-medium text-gray-700">滞在期間</label>
                <select name="stay_duration" id="stay_duration" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach(['日帰り', '１泊', '２泊', '３泊', '４泊～'] as $stay_duration)
                        <option value="{{ $stay_duration }}">{{ $stay_duration }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Title -->
            <div class="mt-4">
                <label for="title" class="block font-medium text-gray-700">タイトル</label>
                <input id="title" class="block mt-1 w-full" type="text" name="title" required />
            </div>

            <!-- Content -->
            <div class="mt-4">
                <label for="content" class="block font-medium text-gray-700">内容</label>
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