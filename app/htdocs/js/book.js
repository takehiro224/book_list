function deleteUser(id, title) {
    const confirmed = confirm(`[${title}]を削除してもよろしいですか？`)
    if (confirmed) {
        document.delete_form.id.value = id;
        document.delete_form.submit();
     }
}