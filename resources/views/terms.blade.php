@section('title', '利用規約')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center mt-16">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('利用規約') }}
            </h2>
            @auth
                <p>ログインユーザー名: {{ auth()->user()->name }}</p>
            @endauth
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-gray-600 text-lg">
                        <p><strong>この利用規約（以下「本規約」といいます）は、みんなの旅日記（以下「当サイト」といいます）の利用条件を定めるものです。</strong></p>
                        <p><strong>当サイトを利用するすべてのユーザーは、本規約に同意したものとみなします。本規約は、利用者と当サイト運営者との間の関係を規定します。</strong></p>
                        <div class="mb-4"></div>
                        <p><strong>1. アカウント</strong></p>
                        <p>1.1 利用者は、当サイトの利用にあたり、一部アカウントを作成する必要があります。</p>
                        <p>1.2 アカウントは、利用者本人によって管理されるものとし、第三者に譲渡、貸与、共有することはできません。</p>
                        <p>1.3 アカウントの登録情報は、正確かつ最新のものである必要があります。</p>
                        <div class="mb-4"></div>
                        <p><strong>2. コンテンツ</strong></p>
                        <p>2.1 利用者が当サイトに投稿するコンテンツは、法律および一般的なモラルに適合し、第三者の権利を侵害していないものとします。</p>
                        <p>2.2 利用者が投稿したコンテンツに関する権利は、当サイトに帰属しますが、利用者にはその使用許可が与えられます。</p>
                        <div class="mb-4"></div>
                        <p><strong>3. 禁止事項</strong></p>
                        <p>利用者は当サイトを利用するにあたり、以下の行為を禁止とします。</p>
                        <p>(a) 法律に違反する行為</p>
                        <p>(b) 他者のプライバシーを侵害する行為</p>
                        <p>(c) 著作権、商標、特許などの知的財産権を侵害する行為</p>
                        <p>(d) スパム行為</p>
                        <p>(e) 当サイトの運営を妨げる行為</p>
                        <div class="mb-4"></div>
                        <p><strong>4. 免責事項</strong></p>
                        <p>当サイトは、利用者が投稿したコンテンツについて一切の責任を負いません。</p>
                        <p>また、当サイトの利用によって生じた損害についても、一切の責任を負いません。</p>
                        <div class="mb-4"></div>
                        <p><strong>5. 変更</strong></p>
                        <p>当サイトは、本規約を変更する権利を留保します。変更後の規約は、当サイト上で公開された時点で効力を生じます。</p>
                        <div class="mb-4"></div>
                        <p><strong>6. お問い合わせ</strong></p>
                        <p>本規約に関するお問い合わせは、<a href="{{ route('contactus') }}" class="text-blue-500 underline">こちら</a>から受け付けております。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <x-footer />
    
</x-app-layout>
