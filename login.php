<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario;
include 'CLASSES/conecta.php';
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
                    <label>Nome</label>
                    <input value="<?php if(isset($_COOKIE[""])) { echo $_COOKIE[""]; } ?>" 
                    type="text" name="nome" id="nome">
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
    <script src="scriptlogin.js"></script>
</body>
<?php
if(isset($_POST['logar'])){
    $nome = addslashes($_POST['nome']);
    $codigo = addslashes($_POST['codigo']);

    if(!empty($nome) && !empty($codigo)){
        if($u->msgErro == ""){
            if($u->logar($nome,$codigo)){
                if(!empty($_POST['remeber'])){
                    setcookie("nome",$nome,time()+ (10 * 365 * 24 * 60 * 60));
                    setcookie ("codigo",$codigo,time()+ (10 * 365 * 24 * 60 * 60));
                } else {
                    if(isset($_COOKIE["nome"])){  
                        setcookie ("nome","");  
                    }  
                    if(isset($_COOKIE["codigo"])){  
                        setcookie ("codigo","");  
                    }  
                }
                if($_SESSION['rol'] == 0){
                    header("location: admin.php");
                } else if($_SESSION['rol'] == 1) {
                    header("location: homepage.php");
                }
            } else {
                ?>
                <script>
                    setErrorFor(inputName," ");
                    setErrorFor(inputCod,"Usuário e/ou senha incorretos");
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