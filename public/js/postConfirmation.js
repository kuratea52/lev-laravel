// 新規投稿時に確認ダイアログを表示

document.getElementById('submitBtn').addEventListener('click', function(event) {
    // 投稿ボタンがクリックされたときに確認ダイアログを表示
    if (!confirm('投稿しますか？')) {
        event.preventDefault(); // フォームの送信をキャンセル
    }
});