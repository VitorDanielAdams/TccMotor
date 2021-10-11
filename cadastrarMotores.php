<?php
    session_start();
    if(!isset($_SESSION['id_user'])){
        header("location: index.php");
        exit;
    } else { 
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

    <link rel="stylesheet" type="text/css" href="CSS/styleMotores.css" />
    <link rel="icon" href="images/icon.jpg">

    <title>Pagina de Cadastro</title>
</head>
<body>
    <header>
        <img src="images/logo.png">
        <h1>Cadastro de Motores</h1>
    </header>
    <div class="container">
        <div class="box">
            <div class="content">
                <div class="left">
                    <div class="input">
                        <label>Sistema</label>
                        <select name="">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="input">
                        <label>Marca</label>
                        <input type="text">
                    </div>
                    <div class="input">
                        <label>Potência</label>
                        <input type="text">
                    </div>
                    <div class="input">
                        <label>Voltagem</label>
                        <select name="voltagem">
                            <option value="110">110</option>
                            <option value="220">220</option>
                            <option value="380">380</option>
                        </select>
                    </div>
                    <div class="input">
                        <label>Amperagem</label>
                        <input type="text">
                    </div>
                    <div class="input">
                        <label>Nº Bitola</label>
                        <input type="text">
                    </div>
                    <div class="input">
                        <label>Nº de Fios</label>
                        <input type="number">
                    </div>
                    <div class="input">
                        <label>Nº de Espiras</label>
                        <input type="text">
                    </div>
                </div>
                <div class="right">
                    <div class="input">
                        <label>RPM</label>
                        <input type="number" maxlength="4">
                    </div>
                    <div class="input">
                        <label>Sentido de Rotação</label>
                        <select name="">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="input">
                        <label>Informações opcionais</label>
                        <input type="text">
                    </div>
                    <div class="input">
                        <label>Imagem</label>
                        <input type="text">
                    </div>
                </div>
            </div>
            <button type="submit">Salvar</button>
        </div>
    </div>
</body>
</html>

<?php 
    }
?>