<?php
session_start();

if(!isset($_SESSION['id_user'])){
    header("location: index.php");
    exit;
} else if ($_SESSION['tipo'] == 1){ 

require_once 'CLASSES/Usuarios.php';
$u = new Usuario;  

include 'Conecta.php';
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
        <h1>Funcionarios</h1>
        <div class="headericons">
            <a href="admin.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            <a href="sair.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
        </div>
        <form method="GET" class="form">
                <div class="searchbar">
                    <input name="busca" placeholder="Procure pelo Funcionário">
                </div>
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
    </header>
    <div class="barratarefas">
        <a href="cadastro.php">Adicionar</a>
    </div>
    
    <div class="container">
        <?php 

            $itens_por_pagina = 6;
            $numlinks = $u->paginacao($itens_por_pagina);
            $pagina = (isset($_GET['start'])) ? $_GET['start'] : 0;	
            if (!$pagina) $pagina = 0;
            $start = $pagina * $itens_por_pagina;

            if (isset($_GET['busca'])) {
               
                $busca = addslashes($_GET['busca']);
               
                $funcionarios = $u->mostraPesquisa($busca,$start,$itens_por_pagina);
                
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
                            <a href='trocarSenha.php?id=<?= $f['id'] ?>' onclick="return confirmation()" class='change' id='<?= $f['id'] ?>'>
                                <img src="./images/lock.svg" alt="editarsenha">
                            </a>
                        </td>
                        <td>
                            <a href='editarFuncionario.php?id=<?= $f['id'] ?>'>
                                <img src="./images/edit.svg" alt="editar">
                            </a>
                        </td>
                        <td>
                            <a href='excluirFuncionario.php?id=<?= $f['id'] ?>'>
                                <img src="./images/remove.svg" alt="remover">
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody> 
            </table>
        <div class="paginacao">
            <?php 
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
                if(($i+1) > $pagina && $pagina < $numlinks-1){
                    echo "<a href='funcionarios.php?busca=$busca&start=".($pagina+1)."' class='pag'>Proxima</a>";
                } 
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
                        <a href='trocarSenha.php?id=<?= $f['id'] ?>' onclick="return confirmation()" class='change' id='<?= $f['id'] ?>'>
                            <img src="./images/lock.svg" alt="editarsenha">
                        </a>
                    </td>
                    <td>
                        <a href='editarFuncionario.php?id=<?= $f['id'] ?>'>
                            <img src="./images/edit.svg" alt="editar">
                        </a>
                    </td>
                    <td>
                        <a href='excluirFuncionario.php?id=<?= $f['id'] ?>'>
                            <img src="./images/remove.svg" alt="remover">
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody> 
        </table>
    </div>
    <div class="paginacao">
        <?php 
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
</body>
<script src="SCRIPT/scriptchangepassword.js"></script>
</html>
<?php 
}
} else { 
    header("location: homePage.php");
    exit;
} 
?>