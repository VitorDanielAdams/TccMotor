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
        <a href="menu.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
    </header>
    <div class="container">
        <div class="pesquisa">
            <form method="GET" class="form">
                <div class="searchbar">
                    <input name="busca" placeholder="Procurar Motor">
                </div>
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <?php
            if (isset($_GET['busca']) && !empty($_GET['busca'])) {
               
                $busca = addslashes($_GET['busca']);
               
                $motor = $m->mostraPesquisa($busca);
                $motorsp = $m->mostraPesquisaSP($busca);
                
                if($motor == false && $motorsp == false){
                    ?>
                        <div class="nosearch">
                            <h1>Nenhum resultado encontrado <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h1>
                            <div class="paginacao">
                                <?php
                                    echo "<a href='pesquisa.php' class='pag'>Voltar</a>";
                                ?>
                            </div>
                        </div>
                    <?php
                } 
            } else {

                $motor = $m->mostrarMotorCP();
                $motorsp = $m->mostrarMotorSP();

            }

            foreach ($motor as $mcp){

        ?>
        <div class="item">
            <a href='mostrarMotor.php?id=<?= $mcp['id'] ?>'>
                <div class="imagem">
                    <img src="upload/<?= $mcp['imagem']?>" >
                </div>
            </a>
            <div class="content">   
                <div class="row">
                    <div class="text">
                        <div class="title"><h2>Cliente</h2></div>
                        <h4><?= $mcp['cliente'] ?></h4>
                    </div>
                    <div class="text">
                        <div class="title"><h2>Voltagem</h2></div>
                        <h4><?= $mcp['voltagem'] ?></h4>
                    </div>
                    <div class="text">
                        <div class="title"><h2>Potência</h2></div>
                        <h4><?= $mcp['potencia'] ?></h4>
                    </div>
                    <div class="text">
                        <div class="title"><h2>Camada</h2></div>
                        <h4><?= $mcp['camada'] ?></h4>
                    </div>
                    <div class="action">
                        <a href='editarMotor.php?id=<?= $mcp['id'] ?>'>
                            <img src="./images/edit.svg" alt="editar">
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="text">
                        <div class="title"><h2>Sistema</h2></div>
                        <h4><?= $mcp['sistema'] ?></h4>
                    </div>
                    <div class="text">
                        <div class="title"><h2>Marca</h2></div>
                        <h4><?= $mcp['marca'] ?></h4>
                    </div>
                    <div class="text">
                        <div class="title"><h2>Ligação</h2></div>
                        <h4><?= $mcp['ligacao'] ?></h4>
                    </div>
                    <div class="text">
                        <div class="title"><h2>Rotação</h2></div>
                        <h4><?= $mcp['rotacao'] ?></h4>
                    </div>
                     <div class="action">
                        <a href='excluirMotor.php?id=<?= $mcp['id'] ?>' onclick="return confirmation()" class='change' id='<?= $mcp['id'] ?>'>
                            <img src="./images/remove.svg" alt="remover">
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
        <?php } ?>
        <?php

            foreach ($motorsp as $msp){
                
        ?>
        <div class="item">
            <a href='mostrarMotorSP.php?id=<?= $msp['id'] ?>'>
                <div class="imagem">
                    <img src="upload/<?= $msp['imagem']?>" >
                </div>
            </a>
            <div class="content">   
                <div class="row">
                    <div class="textSP">
                        <div class="title"><h2>Cliente</h2></div>
                        <h4><?= $msp['cliente'] ?></h4>
                    </div>
                   
                    <div class="textSP" id="info">
                        <div class="title"><h2>Informações</h2></div>
                        <h4><?= $msp['informacoes'] ?></h4>
                    </div>
                    
                    <div class="action">
                        <a href='editarMotorSP.php?id=<?= $msp['id'] ?>'>
                            <img src="./images/edit.svg" alt="editar">
                        </a>
                    </div>
                </div>
            
                <div class="row">
                    <div class="textSP">
                        <div class="title"><h2>Nº de Bitola Principal</h2></div>
                        <h4><?= $msp['bitolasP'] ?></h4>
                    </div>

                    <div class="textSP">
                        <div class="title"><h2>Nº de Fios Principal</h2></div>
                        <h4><?= $msp['fiosP'] ?></h4>
                    </div>

                    <div class="textSP">
                        <div class="title"><h2>Nº de Espiras Principal</h2></div>
                        <h4><?= $msp['espirasP'] ?></h4>
                    </div>

                    <div class="action">
                        <a href='excluirMotorSP.php?id=<?= $msp['id'] ?>' onclick="return confirmation()" class='change' id='<?= $msp['id'] ?>'>
                            <img src="./images/remove.svg" alt="remover">
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
        <?php } ?>
    </div>
</body>
<script src="SCRIPT/script.js"></script>
</html>

<?php 
    }
?>