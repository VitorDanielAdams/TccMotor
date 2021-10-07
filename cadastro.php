<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario;
include 'Conecta.php';
?>

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

    <title>Tela de Cadastro</title>
    <script src="scriptcad.js"></script>
</head>

<body>
    <header>
        <h1>Logo</h1>
        <div class="headericons">
            <a href="login.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
        </div>
    </header>
    <!--Form Cadastro-->
    <div class="container">
        <div class="box">
            <form method="POST" id="form">
                <div class="photo">
                    
                </div>
                <div class="input">
                    <label>Código Funcionário</label>
                    <input type="text" name="codigo" id="codigo" maxlength="20">
                    <small></small>
                </div>
                <div class="input">
                    <label>Nome</label>
                    <input type="text" name="nome" id="nome" maxlength="30">
                    <small></small>
                </div>
                <div class="input">
                    <label>CPF</label>
                    <input type="text" name="cpf" id="cpf" maxlength="15">
                    <small></small>
                </div>
                <div class="input">
                    <label>Telefone</label>
                    <input type="number" name="telefone" id="telefone" maxlength="11">
                    <small></small>
                </div>
				<div class="input">
					<label>Senha</label>
					<input type="password" name="password" id="password" maxlength="15">
					<small></small>
				</div>
				<div class="input">
					<label>Confirmar Senha</label>
					<input type="password" name="confirmPassword" id="confirmPassword" maxlength="15">
					<small></small>
				</div>
                <div class="select">
                    <label>Cargo</label>
                    <select name="cargo" id="cargo">
                        <option value="hide">Selecione</option>
                        <option value=0>Funcionario</option>
                        <option value=1>Administrador</option>
                    </select>
                    <small></small>
                </div>
                <button name="salvar" type="submit">Salvar</button>
            </form>
        </div>
    </div>
</body>
<?php
if(isset($_POST['salvar'])){
    $codigo = $_POST['codigo'];
    $nome = addslashes($_POST['nome']);
    $cpf = addslashes($_POST['cpf']);
    $telefone = $_POST['telefone'];
	$password = addslashes($_POST['password']);
	$confirmPassword = addslashes($_POST['confirmPassword']);
    $cargo = addslashes($_POST['cargo']);

    if(!empty($codigo) && !empty($nome) && !empty($cpf) && !empty($telefone) && $cargo != 'hide' 
	&& !empty($password) && !empty($confirmPassword)){
        if($u->msgErro == ""){
            if($u->cadastrar($codigo,$nome,$cpf,$telefone,$password,$cargo)){
                ?>
        <div class="sucess">
            <small>Cadastrado com sucesso</small>
        </div>
        <?php
            } else {
            ?>
            <div class="erro">
                <small>Usuario já cadastrado</small>
            </div>
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
		<small>Preencha todos os campos</small>
        <script>
        </script>
        <?php
    }
}
?>
</html>