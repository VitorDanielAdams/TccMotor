function confirmation() {
    var x = confirm("Você tem certeza que deseja deletar o motor?");
    if (x == true) {
        return true;
    } else {
        return false;
    }
}