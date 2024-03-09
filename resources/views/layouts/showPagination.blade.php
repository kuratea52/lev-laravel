<nav aria-label="Page navigation example" class="pagination" id="pagination">
    <ul class="pagination flex items-center -space-x-px h-10 text-base justify-start">
        @if ($comments->onFirstPage())
            <li class="pagination opacity-0 pointer-events-none">
                <a href="#" class="pagination flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Previous</span>
                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                </a>
            </li>
        @else
            <li class="pagination">
                <a href="{{ $comments->appends(request()->query())->previousPageUrl() }}" class="pagination flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Previous</span>
                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                </a>
            </li>
        @endif

        @foreach ($comments->withQueryString()->links()->elements[0] as $page => $url)
            <li class="pagination">
                @if($comments->currentPage() == $page)
                    <span class="flex items-center justify-center px-4 h-10 leading-tight text-white bg-blue-500 border border-gray-300 dark:border-gray-700">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="pagination flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $page }}</a>
                @endif
            </li>
        @endforeach

        @if ($comments->hasMorePages())
            <li class="pagination">
                <a href="{{ $comments->appends(request()->query())->nextPageUrl() }}" class="pagination flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Next</span>
                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </a>
            </li>
        @else
            <li class="pagination opacity-0 pointer-events-none">
                <a href="#" class="pagination flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Next</span>
                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </a>
            </li>
        @endif
    </ul>
    
    <script>
        document.getElementById('pagination').addEventListener('click', function(event) {
            // コメントセクションの要素を取得
            const commentsElement = document.getElementById('pagination');
            console.log(commentsElement);
            // コメントセクションの要素が存在する場合、その要素までスクロールする
            if (commentsElement) {
                const yOffset = commentsElement.getBoundingClientRect().top + window.pageYOffset;
                window.scrollTo({ top: yOffset, behavior: 'smooth' });
            }
        });
    </script>
</nav>