<?php 
session_start();
if(!isset($_SESSION['id_user'])){
    header("location: index.php");
    exit;
} else if ($_SESSION['tipo'] == 1){ 
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

    <link rel="stylesheet" type="text/css" href="CSS/admin.css" />
    <link rel="icon" href="images/icon.jpg">

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <title>Admin Panel</title>
</head>
<body>
    <header>
    </header>
    <div class="btn">
        <span><i class="fa fa-bars" aria-hidden="true"></i></span>
    </div>
    <nav class="sidebar">
            <div class="logo">
                <a href="sair.php"><img src="images/logo.png"></a>
            </div>
                <ul>
                    <li><a href="menu.php">
                        <i class="fa fa-archive" aria-hidden="true"></i> Menu</a>
                    </li>
                    <li><a href="funcionarios.php">
                        <i class="fa fa-user-circle" aria-hidden="true"></i> Funcionarios</a>
                    </li>
                    <li>
                        <a href="pesquisa.php"><i class="fa fa-cog" aria-hidden="true"></i> Motores</a>
                    </li>
                    <li><a href="sair.php">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
                    </li>
                </ul>
        </nav>
</body>
<script>
    $('.btn').click(function(){
        $(this).toggleClass("click");
        $('.sidebar').toggleClass("show");
    });
</script>
</html>
<?php 
} else { 
    header("location: index.php");
    exit;
} 
?>