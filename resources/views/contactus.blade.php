<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQ & お問い合わせ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">よくある質問</h3>
                    <dl>
                        <div class="mt-4">
                            <dt class="text-lg">Q: このサイトでできることは何ですか？</dt>
                            <dd class="mt-2">A: 当サイトでは、旅行の記録を投稿し、他のユーザーの投稿を閲覧したり、コメントやいいねをすることができます。</dd>
                        </div>
                        <div class="mt-4">
                            <dt class="text-lg">Q: 投稿するにはログインが必要ですか？</dt>
                            <dd class="mt-2">A: はい、投稿するにはログインが必要です。ログインせずに他の投稿を閲覧することはできます。</dd>
                        </div>
                        <!-- 他のよくある質問と回答を追加 -->
                    </dl>
                    <h3 class="text-lg font-semibold mb-4 mt-8">お問い合わせ</h3>
                    <p>ご質問やお問い合わせがございましたら、以下のフォームよりお気軽にお問い合わせください。</p>
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="mt-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">お名前</label>
                            <input type="text" name="name" id="name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                        </div>
                        <div class="mt-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">メールアドレス</label>
                            <input type="email" name="email" id="email" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                        </div>
                        <div class="mt-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">お問い合わせ内容</label>
                            <textarea name="message" id="message" rows="4" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required></textarea>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">送信する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>