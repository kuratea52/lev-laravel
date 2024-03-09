document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('pagination').addEventListener('click', function(event) {
        // クリックされた要素がページネーション内の要素かどうかを確認
        if (event.target.closest('.pagination')) {
            // コメントセクションの要素を取得
            const commentsElement = document.getElementById('comments');
            // コメントセクションの要素が存在する場合、その要素までスクロールする
            if (commentsElement) {
                const yOffset = commentsElement.getBoundingClientRect().top + window.pageYOffset;
                window.scrollTo({ top: yOffset, behavior: 'smooth' });
            }
        }
    });
});
