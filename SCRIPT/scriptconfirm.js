function confirmation() {
    var x = confirm("Você tem certeza que deseja excluir?");
    if (x == true) {
        return true;
    } else {
        return false;
    }
}