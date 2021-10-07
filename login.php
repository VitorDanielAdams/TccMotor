<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario;
include 'Conecta.php';
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

    <link rel="stylesheet" type="text/css" href="CSS/styleLogin.css"/>
    <link rel="icon" href="images/icon.jpg">
    
    <title>Tela de login </title>
</head>

<body>
    <div class="container">
        <div class="box">
            <!--Form Login-->
            <form method="POST" id="form">
                <div class="photo">
                    <img src="images/logo.jpg">
                </div>
                <div class="input">
                    <label>Cpf</label>
                    <input value="<?php if(isset($_COOKIE["cpf"])) { echo $_COOKIE["cpf"]; } ?>" 
                    type="text" name="cpf" id="cpf">
                    <small></small>
                </div>
				<div class="input">
					<label>Senha</label>
                    <input value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" 
                    type="password" name="password"  id="password">
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
    <script src="scriptlogin.js"></script>
</body>
<?php
if(isset($_POST['logar'])){
    $cpf = addslashes($_POST['cpf']);
	$password = addslashes($_POST['password']);

    if(!empty($cpf) && !empty($password)){
        if($u->msgErro == ""){
            if($u->logar($cpf,$password)){
                if(!empty($_POST['remeber'])){
                    setcookie("cpf",$cpf,time()+ (10 * 365 * 24 * 60 * 60));
                    setcookie ("password",$password,time()+ (10 * 365 * 24 * 60 * 60));
                } else {
                    if(isset($_COOKIE["cpf"])){  
                        setcookie ("cpf","");  
                    }  
                    if(isset($_COOKIE["password"])){  
                        setcookie ("password","");  
                    }  
                }
                if($_SESSION['tipo'] == 0){
                    header("location: admin.php");
                } else if($_SESSION['tipo'] == 1) {
                    header("location: menu.php");
                }
            } else {
                ?>
				<small>Usuario ou senha invalido</small>
                <script>
                </script>
                <?php
            }
        } else {
            ?>
            <div class="erro">
                <small><?php echo "Erro: ".$u->msgErro; ?></small>
            </div>
            <?php
        }
    } else {
        ?>
		<small>Preencha os campos</small>
        <script>
        </script>
        <?php
    }
}
?>
</html>