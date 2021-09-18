<?php
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
</head>

<body>
    <header>
        <h1>Logo</h1>
        <div class="headericons">
            <a href="funcionarios.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
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
                <div class="select">
                    <select name="cargo" id="cargo">
                        <option value="hide">Cargo</option>
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
?>
</html>