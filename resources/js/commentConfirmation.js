// コメント投稿時に文字数制限を確認するダイアログ
document.getElementById('submitComment').addEventListener('click', function() {
    var content = document.getElementById('commentContent').value;
    if (content.trim() === '') {
        alert('内容が入力されていません。');
        return;
    }
    if (content.length > 101) {
        alert('コメントは100文字以内で入力してください。');
        return;
    }
    if (confirm('コメントを投稿しますか？')) {
        document.getElementById('commentForm').submit();
    }
});