// いいねフォームのサブミットを処理するJavaScriptコード

/*global fetch*/

document.getElementById('likeForm').addEventListener('submit', async function(event) {
    event.preventDefault(); // デフォルトのフォームの送信をキャンセル

    const formData = new FormData(this); // フォームデータを取得
    
    try {
        const response = await fetch(this.action, {
            method: this.method,
            body: formData
        });
    
        if (!response.ok) {
            throw new Error('いいねの追加に失敗しました。');
        }

        const responseData = await response.json(); // レスポンスデータをJSON形式で取得

        // サーバーからのレスポンスでいいねが既に存在するかを確認し、ボタンを無効化する
        if (responseData.alreadyLiked) {
            const likeButton = document.querySelector('#likeForm button');
            if (likeButton) {
                likeButton.disabled = true;
                console.log(1);
            }
        } else {
            // 現在のいいね数を取得して1を加えて更新
            const likeCountElement = document.getElementById('likeCount');
            if (likeCountElement) {
                const currentLikeCount = parseInt(likeCountElement.textContent);
                likeCountElement.textContent = currentLikeCount + 1; // 現在のいいね数に1を加えて表示を更新
            }
        }
    } catch (error) {
        console.error('エラー:', error);
    }
});