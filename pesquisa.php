<?php
session_start();
if(!isset($_SESSION['id_user'])){
    header("location: index.php");
    exit;
} else { 
    require_once 'CLASSES/Motores.php';
    $m = new Motor;
    include 'Conecta.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="CSS/styleMotores.css" />
    <link rel="icon" href="images/icon.jpg">

    <title>Motores</title>
</head>
<body>
    <header>
        <img src="images/logo.png">
        <form method="GET" class="form">
                <div class="searchbar">
                    <input name="busca" placeholder="Procurar Motor">
                </div>
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <a href="menu.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
    </header>


</body>
</html>

<?php 
    }
?>