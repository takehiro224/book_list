function deleteUser(id, title) {
    if(confirm('[' + title + '] を削除してもよろしいですか？')) {
        document.delete_form.id.value = id;
        document.delete_form.submit();
    }
}