// URLに「?page=」が含まれている場合にページ下部までスクロールする
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const pageParam = urlParams.get('page');
    if (pageParam) {
        window.scrollTo({
            top: document.body.scrollHeight - window.innerHeight - 150,
            behavior: 'smooth'
        });
    }
};