/*global searchPosts*/

// 検索ボックスに入力されたキーワードを含む投稿の検索結果ページへ飛ぶ
document.searchPosts = function() {
    var keyword = document.getElementById('searchInput').value;
    window.location.href = '/posts/result?keyword=' + keyword;
}

// Enterキーが押されても検索が実行される
document.getElementById('searchInput').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        document.searchPosts();
    }
});