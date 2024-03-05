// ページネーションリンクのクリックイベントを監視
document.addEventListener("DOMContentLoaded", function() {
    // コメント一覧の要素を取得
    const commentListElement = document.getElementById('comment-list');
    // コメント一覧の要素が存在する場合、その要素までスクロールする
    if (commentListElement) {
        const yOffset = commentListElement.getBoundingClientRect().top + window.pageYOffset;
        window.scrollTo({ top: yOffset, behavior: 'smooth' });
    }
});
