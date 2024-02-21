// 削除操作の確認ダイアログを表示

function confirmDelete() {
    if (confirm('本当に削除しますか？')) {
        document.getElementById('deleteForm').submit();
    }
}