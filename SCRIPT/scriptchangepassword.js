function confirmation() {
    var x = confirm("Você tem certeza que deseja alterar a senha?");
    if (x == true) {
        return true;
    } else {
        return false;
    }
}