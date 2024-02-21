// 新規投稿時に確認ダイアログを表示

document.querySelector('form').addEventListener('submit', function(event) {
    // フォームの送信をキャンセルし、確認ポップアップを表示
    if (!confirm('投稿しますか？')) {
        event.preventDefault();
    }
});