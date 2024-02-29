// 「いいね」ボタンをクリックしたら非同期でインクリメントされる処理

/*global fetch*/

document.addEventListener('DOMContentLoaded', async function() {
    const likeButton = document.getElementById('likeButton');
    const unlikeButton = document.getElementById('unlikeButton');

    // ページ読み込み時に過去にいいねされているかをチェックし、ボタンの表示を切り替える
    const postId = likeButton.dataset.postId; // データ属性から投稿IDを取得
    const url = `/posts/${postId}/checkLike`; // いいねチェックのAPIエンドポイントのURLを構築
    try {
        const response = await fetch(url);
        const responseData = await response.json();
        if (responseData.alreadyLiked) {
            likeButton.style.display = 'none';
            unlikeButton.style.display = 'inline';
        }
    } catch (error) {
        console.error('Error:', error);
    }

    likeButton.addEventListener('click', async function(event) {
        event.preventDefault();

        const likeForm = document.getElementById('likeForm');
        try {
            const response = await fetch(likeForm.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({})
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const responseData = await response.json();

            // サーバーからのレスポンスでいいねが既に存在するかを確認し、ボタンを無効化する
            if (responseData.alreadyLiked) {
                likeButton.style.display = 'none';
                unlikeButton.style.display = 'inline';
            } else {
                // 成功した場合の処理
                alert('いいねしました');
                // いいね数を更新
                const likeCountElement = document.getElementById('likeCount');
                likeCountElement.innerText = parseInt(likeCountElement.innerText) + 1;
                // 「いいね」ボタンを非表示にし、「いいね取り消し」ボタンを表示
                likeButton.style.display = 'none';
                unlikeButton.style.display = 'inline';
            }
        } catch (error) {
            // エラーが発生した場合の処理
            console.error('Error:', error);
            return; // エラーが発生した場合はここで関数を終了
        }
    });
});
