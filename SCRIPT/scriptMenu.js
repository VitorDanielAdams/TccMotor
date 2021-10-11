function onClickMenu() {
    document.getElementById("menu").classList.toggle("change");
    document.getElementById("func").classList.toggle("change");
    document.getElementById("menu-bg").classList.toggle("change-bg");
}

$('.cadastro').click(function() {
    $('.funcao ul .itensFunc').toggleClass('mostra');
});