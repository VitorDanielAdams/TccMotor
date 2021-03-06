<?php
session_start();

if(!isset($_SESSION['id_user'])){
    header("location: index.php");
    exit;
} else if ($_SESSION['tipo'] == 1){ 

require_once 'CLASSES/Usuarios.php';
$u = new Usuario;  

include 'Conecta.php';

$u->createuser();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="CSS/styleListaFuncionarios.css">
    <link rel="icon" href="images/icon.jpg">
    
    <title>Lista de funcionarios</title>
</head>
<body>
    <header>
        <a href="admin.php"><img src="images/logo.png"></a>
        
        <div class="headericons">
            <a href="admin.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
            <a href="sair.php"><i class="fa fa-times" aria-hidden="true"></i> Sair</a>
        </div>
    </header>
    
    <div class="container">
        <div class="box">
            <div class="barratarefas">
                <h1>Lista de Funcionários</h1>
                <a href="cadastro.php">Adicionar</a>
            </div>
            <form method="GET" class="form">
                <div class="searchbar">
                    <input name="busca" placeholder="Procure pelo Funcionário">
                </div>
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
            <?php 

                $itens_por_pagina = 6;
                $numlinks = $u->paginacao($itens_por_pagina);
                $pagina = (isset($_GET['start'])) ? $_GET['start'] : 0;	
                if (!$pagina) $pagina = 0;
                $start = $pagina * $itens_por_pagina;

                if (isset($_GET['busca']) && !empty($_GET['busca'])) {
                
                    $busca = addslashes($_GET['busca']);
                
                    $funcionarios = $u->mostraPesquisa($busca,$start,$itens_por_pagina);
                    if($funcionarios == false){
                        ?>
                            <div class="nosearch">
                                <h1>Nenhum resultado encontrado <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h1>
                                <div class="paginacao">
                                    <?php
                                        echo "<a href='funcionarios.php' class='pag'>Voltar</a>";
                                    ?>
                                </div>
                            </div>
                        <?php
                    } else {
                        $numlinks = $u->paginacaoPesquisa($busca,$start,$itens_por_pagina);
                ?>
                <table id="data-table">
                    <thead>
                        <tr>
                                <th>Nome:</th>
                                <th>Código:</th>
                                <th>CPF:</th>
                                <th>Cargo:</th>
                                <th>Telefone:</th>
                                <th></th>
                                <th></th>
                                <th></th>
                        </tr>
                    </thead>
                    </tbody>
                    <?php 
                    
                        foreach ($funcionarios as $f){     
                    ?>
                            <tr>
                                <td><?= $f['nome'] ?></td>
                                <td><?= $f['codigo'] ?></td>
                                <td><?= $f['cpf'] ?></td>
                                <td>
                                <?php if($f['cargo'] == 1){
                                        echo "Administrador";
                                    } else {
                                        echo "Funcionário";
                                    }
                                ?>
                                </td>
                                <td><?= $f['telefone'] ?></td>
                                <td>
                                    <a href='trocarSenha.php?id=<?= $f['id'] ?>'>
                                        <h2>Senha</h2>
                                    </a>
                                </td>
                                <td>
                                    <a href='editarFuncionario.php?id=<?= $f['id'] ?>'>
                                        <h2>Editar</h2>
                                    </a>
                                </td>
                                <td>
                                    <a href='excluirFuncionario.php?id=<?= $f['id'] ?>' onclick="return confirmation()" class='change' id='<?= $f['id'] ?>'>
                                        <h2>Remover</h2>
                                    </a>
                                </td>
                            </tr>
                        <?php } } ?>
                    </tbody> 
                </table>
            <div class="paginacao">
                <?php 
                $y = 0;
                    if($start > 0){
                        echo "<a href='funcionarios.php?busca=$busca&start=".($pagina-1)."' class='pag'>Anterior</a>";
                    }
                    for($i=0;$i<$numlinks;$i++){
                        $y = $i+1;
                        $class = ' ';
                        if ($pagina == $i){
                            $class = 'active';
                        } 
                        echo "<a href='funcionarios.php?busca=$busca&start=".$i."' class='pag ".$class."'>$y</a>";
                    }
                    if($y > $pagina && $pagina < $numlinks-1){
                        echo "<a href='funcionarios.php?busca=$busca&start=".($pagina+1)."' class='pag'>Proxima</a>";
                    } 
                    echo "<a href='funcionarios.php' class='pag active'>Voltar</a>";
                ?>
            </div>
            <?php        
                } else {
                    $funcionarios = $u->mostraFuncionarios($start,$itens_por_pagina);        
            ?>
            <table id="data-table">
                <thead>
                    <tr>
                            <th>Nome:</th>
                            <th>Código:</th>
                            <th>CPF:</th>
                            <th>Cargo:</th>
                            <th>Telefone:</th>
                            <th></th>
                            <th></th>
                            <th></th>
                    </tr>
                </thead>
                </tbody>
                <?php 
                
                    foreach ($funcionarios as $f){     
                ?>
                    <tr>
                        <td><?= $f['nome'] ?></td>
                        <td><?= $f['codigo'] ?></td>
                        <td><?= $f['cpf'] ?></td>
                        <td>
                        <?php if($f['cargo'] == 1){
                                echo "Administrador";
                            } else {
                                echo "Funcionário";
                            }
                        ?>
                        </td>
                        <td><?= $f['telefone'] ?></td>
                        <td>
                            <a href='trocarSenha.php?id=<?= $f['id'] ?>'>
                                <h2>Senha</h2>
                            </a>
                        </td>
                        <td>
                            <a href='editarFuncionario.php?id=<?= $f['id'] ?>'>
                                <h2>Editar</h2>
                            </a>
                        </td>
                        <td>
                            <a href='excluirFuncionario.php?id=<?= $f['id'] ?>' onclick="return confirmation()" class='change' id='<?= $f['id'] ?>'>
                                <h2>Remover</h2>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody> 
            </table>
            <div class="paginacao">
                <?php 
                    $busca = null;
                    
                    if($start > 0){
                        echo "<a href='funcionarios.php?start=".($pagina-1)."' class='pag'>Anterior</a>";
                    }
                    for($i=0;$i<$numlinks;$i++){
                        $y = $i+1;
                        $class = ' ';
                        if ($pagina == $i){
                            $class = 'active';
                        } 
                        echo "<a href='funcionarios.php?start=".$i."' class='pag ".$class."'>$y</a>";
                    }
                    if($y > $pagina && $pagina < $numlinks-1){
                       
                        echo "<a href='funcionarios.php?start=".($pagina+1)."' class='pag'>Proxima</a>";
                    } 
                ?>
            </div>
        </div>
    </div>

</body>
<script src="SCRIPT/scriptconfirm.js"></script>
</html>
<?php 
}
} else { 
    header("location: menu.php");
    exit;
} 
?>