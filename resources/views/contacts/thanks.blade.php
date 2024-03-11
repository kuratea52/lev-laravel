@section('title', '受付完了')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center mt-16">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                お問い合わせ受付完了
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">お問い合わせ内容のご確認</h3>
                    <p>以下の内容でお問い合わせを受け付けました。3営業日以内に下記メールアドレスまでご連絡いたしますので、今しばらくお待ちくださいませ。</p>
                    <div class="mt-4">
                        <strong>メールアドレス:</strong> {{ $email }}<br>
                        <strong>カテゴリ:</strong> {{ $category }}<br>
                        <strong>お問い合わせ内容:</strong><br>
                        <p>{{ $body }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <x-footer />
    
</x-app-layout>