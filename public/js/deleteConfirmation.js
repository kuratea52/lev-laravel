function confirmDelete() {
    if (confirm('本当に削除しますか？')) {
        document.getElementById('deleteForm').submit();
    }
}