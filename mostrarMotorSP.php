<?php 
session_start();
if(!isset($_SESSION['id_user'])){
    header("location: index.php");
    exit;
} else { 
    require_once 'CLASSES/Motores.php';
    $m = new Motor;
    include 'Conecta.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }	else {
        echo 'Código não informado!';
        exit;
    }
    
    $motor = $m->selecionaSP($id);
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
    
    <link rel="stylesheet" type="text/css" href="CSS/styleMostrarMotor.css" />
    <link rel="icon" href="images/icon.jpg">

    <title>Detalhes do Motor</title>
</head>
<body>
    <header>
        <a href="pesquisa.php"><img src="images/logo.png"></a>
        <a href="pesquisa.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
    </header>

    <div class="container">
        <div class="box">
            <div class="titulo">Motor Sem Placa</div>
            <div class="content">
                <div class="imagem">
                    <img src="upload/<?= $motor['imagem']?>" >
                </div> 
                <div class="center">
                    <div class="text">
                        <h2>Cliente:</h2>
                        <h3><?= $motor['cliente']?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="text">
                        <h2>Nº de Bitola Principal:</h2>
                        <h3><?= $motor['bitolasP']?></h3>
                    </div>
                    <div class="text">
                        <h2>Nº de Bitola Auxiliar:</h2>
                        <h3><?= $motor['bitolaAux']?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="text">
                        <h2>Nº de Fios Principal:</h2>
                        <h3><?= $motor['fiosP']?></h3>
                    </div>
                    <div class="text">
                        <h2>Nº de Fios Auxiliar:</h2>
                        <h3><?= $motor['fiosAux']?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="text">
                        <h2>Nº de Espiras Principal:</h2>
                        <h3><?= $motor['espirasP']?></h3>
                    </div>
                    <div class="text">
                        <h2>Nº de Espiras Auxiliar:</h2>
                        <h3><?= $motor['espirasAux']?></h3>
                    </div>
                </div>
                <?php 
                    if(!empty($motor['informacoes'])){
                ?>
                <div class="center">
                    <h2>Informações Adicionais:</h2>
                    <h3><?= $motor['informacoes']?></h3>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php } ?>