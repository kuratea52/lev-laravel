// 「いいね取り消し」ボタンをクリックしたら非同期でデクリメントされる処理

/*global fetch*/
/*global likeButton*/
/*global unlikeButton*/

unlikeButton.addEventListener('click', async function(event) {
    event.preventDefault();
    
    const unlikeForm = document.getElementById('unlikeForm');
    try {
        const response = await fetch(unlikeForm.action, {
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
        if (responseData.success) {
            // 成功した場合の処理
            alert('いいねを取り消しました');
            // いいね数を更新
            const likeCountElement = document.getElementById('likeCount');
            likeCountElement.innerText = parseInt(likeCountElement.innerText, 10) - 1;
            // 「いいね取り消し」ボタンを非表示にし、「いいね」ボタンを表示
            unlikeButton.style.display = 'none';
            likeButton.style.display = 'inline';
        } else {
            // 失敗した場合の処理
            alert('いいねの取り消しに失敗しました');
        }
    } catch (error) {
        // エラーが発生した場合の処理
        console.error('Error:', error);
        alert('いいねの取り消しに失敗しました');
    }
});
