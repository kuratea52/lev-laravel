@section('title', '新規投稿')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center mt-16">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('旅日記を投稿する') }}
            </h2>
            @auth
                <p>ログインユーザー名: {{ auth()->user()->name }}</p>
            @endauth
        </div>
    </x-slot>

    <div class="container mx-auto my-8">
        <form method="POST" action="{{ route('posts.store') }}" class="post-details bg-white shadow-md sm:rounded-lg px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto" enctype="multipart/form-data">
            @csrf
            
            <!-- Title -->
            <div class="mt-4">
                <label for="title" class="block font-medium text-gray-700">タイトル</label>
                <input id="title" class="block mt-1 w-full" type="text" name="title" required />
            </div>

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
                <label for="participants" class="block font-medium text-gray-700">人数</label>
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
            
            <!-- Content -->
            <div class="mt-4">
                <label for="content" class="block font-medium text-gray-700">内容</label>
                <textarea id="content" name="content" rows="5" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
            </div>
            
            <!-- Image Upload -->
            <div class="mt-4">
                <label for="image_1" class="block font-medium text-gray-700">画像１</label>
                <input id="image_1" type="file" name="image_1" accept="image/*" class="block mt-1 w-full" />
            </div>
            <div class="mt-4">
                <label for="image_2" class="block font-medium text-gray-700">画像２</label>
                <input id="image_2" type="file" name="image_2" accept="image/*" class="block mt-1 w-full" />
            </div>
            <div class="mt-4">
                <label for="image_3" class="block font-medium text-gray-700">画像３</label>
                <input id="image_3" type="file" name="image_3" accept="image/*" class="block mt-1 w-full" />
            </div>
            
            <!-- 公開可否 -->
            <div class="mt-4">
                <label for="is_public" class="block font-medium text-gray-700">公開可否</label>
                <select name="is_public" id="is_public" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="1">公開</option>
                    <option value="0">非公開</option>
                </select>
            </div>
            
            <!-- 行った場所と感想 -->
            <div class="mt-4">
                <label class="block font-medium text-gray-700">行った場所と感想</label>
                <!-- 行った場所１～５と感想のフォーム -->
                @for ($i = 1; $i <= 5; $i++)
                <div class="mt-2 flex items-center">
                    <input id="place_visited_{{$i}}" name="place_visited_{{$i}}" type="text" class="block w-1/2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="行った場所{{$i}}" />
                    <textarea id="impressions_{{$i}}" name="impressions_{{$i}}" rows="2" class="block ml-2 w-1/2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="感想{{$i}}"></textarea>
                </div>
                @endfor

                <!-- 「＋」のアイコンをクリックして追加入力 -->
                <div id="additional-fields" class="mt-2">
                    <button type="button" id="add-more-fields" class="flex items-center text-gray-700 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.477 0 10c0 5.523 4.477 10 10 10 5.523 0 10-4.477 10-10C20 4.477 15.523 0 10 0zm1 10a1 1 0 0 1-1 1H6a1 1 0 1 1 0-2h4V6a1 1 0 1 1 2 0v4z" clip-rule="evenodd" />
                        </svg>
                        <span>追加入力</span>
                    </button>
                </div>
            </div>

            <!-- 送信ボタン -->
            <div class="flex items-center justify-end mt-4">
                <button id="submitBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('投稿する') }}
                </button>
            </div>
        </form>
    </div>
    
    <x-footer />
    
    @vite('resources/js/addField.js')
    @vite('resources/js/postConfirmation.js')
</x-app-layout>