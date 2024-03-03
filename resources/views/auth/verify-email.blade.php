@section('title', 'メールアドレス認証のご案内')

<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('みんなの旅日記へのご登録ありがとうございます。ご入力いただいたメールアドレスへリンクを送信しました。届いていない場合は、以下の送信ボタンから再送できます。') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('入力されたメールアドレスに、新しい認証リンクが送信されました。') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('認証メールの再送') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('ログアウト') }}
            </button>
        </form>
    </div>
</x-guest-layout>
