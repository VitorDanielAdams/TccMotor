<?php 
    session_start();
    if(!isset($_SESSION['id_user'])){
        header("location: index.php");
        exit;
    } 
    require_once 'CLASSES/Motores.php';
    $m = new Motor;

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }	else {
        echo 'Código não informado!';
        exit;
    }

    include 'Conecta.php';

    $motor = $m->selecionaSP($id);

    $oldimage = $motor['imagem'];
    $upload_dir='upload/';
    unlink($upload_dir.$oldimage);

    $m->deletaSP($id);

    header("location: pesquisa.php");

?>