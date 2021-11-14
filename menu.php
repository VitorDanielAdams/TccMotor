<?php 
session_start();
if(!isset($_SESSION['id_user'])){
    header("location: index.php");
    exit;
} 

require_once 'CLASSES/usuarios.php';
$u = new Usuario;
include 'Conecta.php';

if($u->logged($_SESSION['id_user'])){
    $user = $u->logged($_SESSION['id_user']);
} else {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="CSS/site.css" />
    <link rel="icon" href="images/icon.jpg">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	<title>Pagina Menu Inicial</title>
</head>
<body>
    <header>
        <div class="menuhamb">
            <div id="menu-bar">
                <div id="menu" onclick="onClickMenu()">
                    <div id="bar1" class="bar"></div>
                    <div id="bar2" class="bar"></div>
                    <div id="bar3" class="bar"></div>
                </div>
                <ul class="func" id="func">
                    <li><h1>Bem vindo <?= $user['nome'] ?></h1></li>
                    <li><a href="" class="cadastro">Cadastrar motor</a>
                        <ul class="itensFunc">
                            <li><a href="cadastrarMotores.php">Motor com placa</a></li>
                            <li><a href="cadastrarMotoresSP.php">Motor sem placa</a></li>
                        </ul>
                    </li>
                    <li><a href="pesquisa.php">Pesquisar motor</a></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>
            </div>
            <div class="menu-bg" id="menu-bg"></div>
        </div>
        <?php
            if($_SESSION['tipo'] == 1){
                ?>
                    <a href="admin.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
                <?php
            }
        ?>
    </header>
    <div class="container">
		<div class="box">
			<div class="logo">
				<img src="images/logo.png">
			</div>
			<div class="escrita">
				<p>PROGRAMA DE ESQUEMAS DE REBOBINAGEM DE MOTORES ELÉTRICOS</p>	
			</div>
		</div>
    </div>
<script type="text/javascript" src="SCRIPT/scriptMenu.js"></script>   
</body>
</html>

<?php 

?>