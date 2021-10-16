<?php
session_start();

if(!isset($_SESSION['id_user'])){
    header("location: index.php");
    exit;
} else if ($_SESSION['tipo'] == 1){ 

require_once 'CLASSES/Usuarios.php';
$u = new Usuario;  

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}	else {
    echo 'Código não informado!';
    exit;
}

include 'Conecta.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/styleSenha.css">
    
    <link rel="icon" href="images/icon.jpg">

    <title>Alterar Senha</title>
</head>
<body>
    <header>
        <h1>Funcionarios</h1>
        <div class="headericons">
            <a href="funcionarios.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
            <a href="sair.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
        </div>
    </header>
    <!--Form Cadastro-->
    <div class="container">
        <div class="box">
            <form method="POST" id="form">
                <div class="title">
                    <h1>Alterar Senha</h1>
                </div>
                <div class="content">
                    <div class="input">
                        <label>Senha Antiga</label>
                        <input type="password" name="oldPassword" id="oldPassword" maxlength="15">
                        <span class="eye">
                            <i class="fa fa-eye" aria-hidden="true" id="show" onclick="toggleOld()"></i>
                            <i class="fa fa-eye-slash" aria-hidden="true" id="hide" onclick="toggleOld()"></i>
                        </span>
                    </div>
                    <div class="input">
                        <label>Senha Nova</label>
                        <input type="password" name="password" id="password" maxlength="15">
                        <span class="eye">
                            <i class="fa fa-eye" aria-hidden="true" id="show1" onclick="togglePass()"></i>
                            <i class="fa fa-eye-slash" aria-hidden="true" id="hide1" onclick="togglePass()"></i>
                        </span>
                    </div>
                    <div class="input">
                        <label>Confirmar Senha Nova</label>
                        <input type="password" name="confirmPassword" id="confirmPassword" maxlength="15">
                        <span class="eye">
                            <i class="fa fa-eye" aria-hidden="true" id="show2" onclick="toggleConf()"></i>
                            <i class="fa fa-eye-slash" aria-hidden="true" id="hide2" onclick="toggleConf()"></i>
                        </span>
                    </div>
                    <small id="text-error"></small>
                    <div class="btn">
                        <button name="salvar" type="submit" onclick="return checkInputs();">Alterar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="SCRIPT/requiredsenha.js"></script>
</body>
</html>
<?php 
if(isset($_POST['salvar'])){
    $oldPassword = addslashes($_POST['oldPassword']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $senha = $u->senha($id);

    if(!empty($oldPassword) && !empty($password) && !empty($confirmPassword)){
        if($senha['senha'] == md5($password)){
            ?>
            <script>
                text.innerText = "A senha nova não pode ser igual a senha antiga";
            </script>
            <?php
        } else {
            if($u->msgErro == ""){
                if($u->alterarSenha($id,$oldPassword,$password)){
                    header("location: funcionarios.php");
                } else {
                    ?>
                        <script>
                            text.innerText = "A senha antiga está incorreta";
                        </script>
                    <?php
                }
            } else {
                ?>
                    <script>
                        text.innerText = <?php echo "Erro: ".$u->msgErro; ?>;
                    </script>
                <?php
            }
        }
    } else {
        ?>
            <script>
                form.addEventListener('submit', (e) => {
                    checkInputs();
                    if (!checkInputs()) {
                        e.preventDefault();
                    }
                });
            </script>
        <?php
    }
}
} else { 
    header("location: menu.php");
    exit;
} ?>