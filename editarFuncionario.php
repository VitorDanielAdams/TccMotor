<?php
session_start();
if(!isset($_SESSION['id_user'])){
    header("location: index.php");
    exit;
} else if ($_SESSION['tipo'] == 1){ 

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}	else {
    echo 'Código não informado!';
    exit;
}

require_once 'CLASSES/Usuarios.php';
$u = new Usuario;
include 'Conecta.php';

$funcionarios = $u->seleciona($id); 
?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css ">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="CSS/styleCadastro.css" />
    <link rel="icon" href="images/icon.jpg">

    <title>Editar Cadastro</title>
</head>

<body>
    <header>
        <img src="images/logo.png">
        <div class="headericons">
            <a href="funcionarios.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
        </div>
    </header>
    <!--Form Cadastro-->
    <div class="container">
        <div class="box">
            <form method="POST" id="form">
                <div class="title"> 
                    <h1>Editar</h1>
                </div>
                <div class="content">
                    <div class="input">
                        <label>Código Funcionário</label>
                        <input type="text" value="<?= $funcionarios['codigo'] ?>" 
                        name="codigo" id="codigo" maxlength="20">
                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                    </div>
                    <div class="input">
                        <label>Nome</label>
                        <input type="text" value="<?= $funcionarios['nome'] ?>" 
                        name="nome" id="nome" maxlength="30">
                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                    </div>
                    <div class="input">
                        <label>CPF</label>
                        <input type="text" value="<?= $funcionarios['cpf'] ?>" 
                        name="cpf" id="cpf" maxlength="15">
                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                    </div>
                    <div class="input">
                        <label>Telefone</label>
                        <input type="number" value="<?= $funcionarios['telefone'] ?>" 
                        name="telefone" id="telefone" maxlength="11">
                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                    </div>
                    <div class="input">
                        <label>Cargo</label>
                        <select name="cargo" id="cargo">
                            <option value="<?= $funcionarios['cargo'] ?>">Selecione</option>
                            <option value=0>Funcionario</option>
                            <option value=1>Administrador</option>
                        </select>
                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                    </div>
                    <small id="text-error"></small>
                    <div class="btn">
                        <button name="salvar" type="submit" onclick="return checkInputs();">Salvar</button>
                    </div>   
                </div> 
            </form>
        </div>
    </div>
    <script src="SCRIPT/scriptcad.js"></script>
</body>
<?php
if(isset($_POST['salvar'])){
    $codigo = strip_tags($_POST['codigo']);
    $nome = addslashes(strip_tags($_POST['nome']));
    $cpf = addslashes(strip_tags($_POST['cpf']));
    $telefone = strip_tags($_POST['telefone']);
    $cargo = addslashes(strip_tags($_POST['cargo']));

    if(!empty($codigo) && !empty($nome) && !empty($cpf) && !empty($telefone)){
        if($u->msgErro == ""){
            if($u->editar($codigo,$nome,$cpf,$telefone,$cargo,$id)){
                header("location: funcionarios.php");
            } else {
                ?>
                    <script>
                        text.innerText = "Usuario já cadastrado";
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

<?php 
} else { 
    header("location: menu.php");
    exit;
} 
?>