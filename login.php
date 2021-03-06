<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario;
include 'Conecta.php';

$u->createuser();
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                    <img src="images/logo.png">
                </div>
                <div class="content">
                    <div class="input">
                        <label>CPF</label>
                        <input value="<?php if(isset($_COOKIE["cpf"])) { echo $_COOKIE["cpf"]; } ?>" 
                        type="text" name="cpf" id="cpf">
                        <span class="icon-error"><i class="fa fa-times" aria-hidden="true"></i></span>
                    </div>
                    <div class="input">
                        <label>Senha</label>
                        <input value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" 
                        type="password" name="password" id="password">
                        <span class="eye">
                            <i class="fa fa-eye" aria-hidden="true" id="show" onclick="toggle()"></i>
                            <i class="fa fa-eye-slash" aria-hidden="true" id="hide" onclick="toggle()"></i>
                        </span>
                    </div>
                    <small id="text-error"></small>
                    <div class="check">
                        <input type="checkbox" id="rem" name="remeber">
                        <label for="rem">Lembrar-me</label>
                    </div>
                    <div class="btn">
                        <button type="submit" name="logar" onclick="return checkInputs();">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="SCRIPT/scriptlogin.js"></script>
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
                if($_SESSION['tipo'] == 1){
                    header("location: admin.php");
                } else if($_SESSION['tipo'] == 0) {
                    header("location: menu.php");
                }
            } else {
                ?>
                    <script>
                        text.style.display = "flex"
                        text.innerText = "Usu??rio e/ou senha inv??lidos";
                        setErrorFor(cpf);
                        setErrorFor(inputPassword);
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
            <script>
                form.addEventListener('submit', (e) => {
                    checkInputs();
                    if(!checkInputs()){
                        e.preventDefault();
                    }
                });
            </script>
        <?php
    }
}
?>
</html>