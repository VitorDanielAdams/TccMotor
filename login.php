<?php
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="CSS/style.css"/>
    <link rel="icon" href="images/icon.jpg">
    
    <title>Tela de login </title>
</head>

<body>
    <div class="container">
        <div class="box">
            <!--Form Login-->
            <form method="POST" id="form">
                <div class="title">
                    <span>Login</span>
                </div>
                <div class="input">
                    <label>Nome</label>
                    <input value="<?php if(isset($_COOKIE[""])) { echo $_COOKIE[""]; } ?>" 
                    type="text" name="user" id="user">
                    <small></small>
                </div>
                <div class="input">
                    <label>Código</label>
                    <input value="<?php if(isset($_COOKIE[""])) { echo $_COOKIE[""]; } ?>" 
                    type="text" name="codigo" id="codigo">
                    <small></small>
                </div>
                <div class="check">
                    <input type="checkbox" id="rem" name="remeber">
                    <label for="rem">Lembrar-me</label>
                </div>
                <button type="submit" name="logar">Entrar</button>
                <div class="cad">
                    <a id="linkcad" href="cadastro.php">Cadastre-se.</a>
                </div>
            </form>
        </div>
    </div>
</body>
<?php
?>
</html>