document.addEventListener('DOMContentLoaded', function() {
    // 送信ボタンを取得
    var submitButton = document.getElementById('submitButton');

    // 送信ボタンにクリックイベントを追加
    submitButton.addEventListener('click', function(event) {
        // フォームの送信をキャンセル
        event.preventDefault();

        // 確認ダイアログを表示し、ユーザーの選択に応じてフォームを送信するかどうかを決定
        if (confirm('お問い合わせを送信しますか？')) {
            // OKが押された場合はフォームを送信
            event.target.closest('form').submit();
        } else {
            // キャンセルが押された場合は何もしない
            console.log('送信がキャンセルされました。');
        }
    });
});