// ページネーションリンクのクリックイベントを監視
document.addEventListener("DOMContentLoaded", function() {
    // ページが show.blade.php から遷移された場合は下にスクロールする
    const isFromShow = sessionStorage.getItem('isFromShow') === 'true';

    if (isFromShow) {
        // ページが show.blade.php から遷移された場合は下にスクロールする
        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    }
});

// ページ遷移前のURLをセッションストレージに保存
window.addEventListener('beforeunload', function() {
    const prevUrl = window.location.href;
    sessionStorage.setItem('isFromShow', prevUrl.includes('posts'));
});
