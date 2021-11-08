<?php 
    session_start();
    if(!isset($_SESSION['id_user'])){
        header("location: index.php");
        exit;
    } else if ($_SESSION['tipo'] == 1){ 
    require_once 'CLASSES/Motores.php';
    $m = new Motor;

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }	else {
        echo 'Código não informado!';
        exit;
    }

    include 'Conecta.php';

    $m->deletaCP($id);

    header("location: pesquisa.php");

    } else { 
        header("location: homePage.php");
        exit;
    }
?>