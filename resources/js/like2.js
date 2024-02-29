/*global fetch*/

document.addEventListener('DOMContentLoaded', function() {
    
    const likeButton = document.getElementById('likeButton');
    
    likeButton.addEventListener('click', function(event) {
        event.preventDefault(); // ボタンのデフォルトの動作をキャンセル
        const likeForm = document.getElementById('likeForm');
        fetch(likeForm.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // 成功した場合の処理
                alert('いいねしました');
                // いいね数を更新
                const likeCountElement = document.getElementById('likeCount');
                likeCountElement.innerText = parseInt(likeCountElement.innerText) + 1;
                // 「いいね」ボタンを非表示にし、「いいね取り消し」ボタンを表示
                likeButton.style.display = 'none';
                const unlikeButton = document.getElementById('unlikeButton');
                unlikeButton.style.display = 'inline';
            } else {
                // 失敗した場合の処理
                alert('いいねできませんでした');
            }
        })
        .catch(error => {
            // エラーが発生した場合の処理
            console.error('Error:', error);
        });
    });
});
