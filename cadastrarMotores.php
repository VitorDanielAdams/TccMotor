<?php
session_start();
if(!isset($_SESSION['id_user'])){
    header("location: index.php");
    exit;
} else { 
    require_once 'CLASSES/Motores.php';
    $m = new Motor;
    include 'Conecta.php';
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="CSS/stylecadMotores.css" />
    <link rel="icon" href="images/icon.jpg">

    <title>Pagina de Cadastro</title>
</head>
<body>
    <header>
        <img src="images/logo.png">
        <h1>Cadastro de Motores</h1>
        <a href="menu.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
    </header>
    <div class="container">
        <form method="POST" id="form" enctype="multipart/form-data">
            <div class="box">
                <div class="content">
                    <div class="left">
                        <div class="input">
                            <label>Sistema</label>
                            <select name="sistema" id="sistema">
                                <option value="hide">Selecione</option>
                                <option value="monof">Monofásico</option>
                                <option value="trif">Trifásico</option>
                            </select>
                        </div>
                        <div class="input">
                            <label>Potência</label>
                            <input type="text" name="potencia" id="potencia">
                        </div>
                        <div class="input">
                            <label>Voltagem</label>
                            <input type="text" name="voltagem" id="voltagem">
                        </div>
                        <div class="input">
                            <label>Amperagem</label>
                            <input type="text" name="amperagem" id="amperagem">
                        </div>
                        <div class="input">
                            <label>Nº Bitola</label>
                            <input type="text" name="bitola" id="bitola">
                        </div>
                        <div class="input">
                            <label>Nº de Fios</label>
                            <input type="number" name="fios" id="fios">
                        </div>
                        <div class="input" id="inputespiras">
                            <label>Nº de Espiras</label>
                            <div class="box-add">
                                <div class="field">
                                    <input type="textbox" name="espiras[]" id="espiras">
                                </div>
                                <div class="button-box">
                                    <input type="button" name="submit" id="submit" value="+" onclick="add_more()">
                                </div>
                            </div>	
                            <input type="hidden" id="box_count" value="1">
                        </div>
                        
                    </div>
                    <div class="right">
                        <div class="input">
                            <label>Marca</label>
                            <input type="text" name="marca" id="marca">
                        </div>
                        <div class="input">
                            <label>RPM</label>
                            <input type="text" name="rpm" id="rpm">
                        </div>
                        <div class="input">
                            <label>Sentido de Rotação</label>
                            <select name="rotacao" id="rotacao">
                                <option value="hide">Selecione</option>
                                <option value="horario">Horário</option>
                                <option value="anti">Anti-horário</option>
                            </select>
                        </div>
                        <div class="input">
                            <label>Esquema de ligação</label>
                            <select name="ligacao" id="ligacao">
                                <option value="hide">Selecione</option>
                                <option value="serie">Série</option>
                                <option value="paralelo">Paralelo</option>
                            </select>
                        </div>
                        <div class="input">
                            <label>Camada</label>
                            <select name="camada" id="camada">
                                <option value="hide">Selecione</option>
                                <option value="horario">Única</option>
                                <option value="anti">Dupla</option>
                            </select>

                        </div>
                        <div class="input">
                            <label>Informações opcionais</label>
                            <input type="text" name="informacoes" id="informacoes">
                        </div>
                        <div class="input">
                            <div class="inputfile">
                                <label for="imagem">Importar imagem</label>
                                <input type="file" id="imagem" name="imagem">
                            </div>
                        </div>
                    </div>
                </div>
                <small id="text-error"></small>
                <div class="btn">
                    <button name="salvar" type="submit" onclick="return checkInputs();">Salvar</button>
                </div>
            </div>
        </form>
    </div>
    <script src="SCRIPT/jquery-1.4.1.min.js"></script>
    <script>
        $('#imagem').change(function() {
            var i = $(this).prev('label').clone();
            var file = $('#imagem')[0].files[0].name;
            $(this).prev('label').text(file);
        });
        function add_more(){
            var box_count=jQuery("#box_count").val();
            if(box_count < 6){
                box_count++;
                jQuery("#box_count").val(box_count);
                jQuery("#inputespiras").append('<div class="box-add" id="box_loop_'+box_count+'"><div class="field"><input type="text" name="espiras[]" id="espiras"></div><div class="button-box-r"><input type="button" name="submit" id="submit" value="X" onclick=remove_more("'+box_count+'")></div></div>');     
            }
        }
        function remove_more(box_count){
            jQuery("#box_loop_"+box_count).remove();
            var box_count=jQuery("#box_count").val();
            box_count--;
            jQuery("#box_count").val(box_count);
        }
    </script>
    <script src="SCRIPT/scriptcadmotor.js"></script>
</body>
<?php
if(isset($_POST['salvar'])){
    $sistema =  addslashes($_POST['sistema']);
    $potencia = addslashes($_POST['potencia']);
    $voltagem = addslashes($_POST['voltagem']);
    $amperagem =  addslashes($_POST['amperagem']);
	$bitola = addslashes($_POST['bitola']);
	$fios = $_POST['fios'];
    $espiras = implode(", ", $_POST["espiras"]);
    $marca = addslashes($_POST['marca']);
    $rpm = addslashes($_POST['rpm']);
    $rotacao = addslashes($_POST['rotacao']);
    $ligacao = addslashes($_POST['ligacao']);
    $camada = addslashes($_POST['camada']);
    $informacoes = addslashes($_POST['informacoes']);
    
    $images=$_FILES['imagem']['name'];
    $tmp_dir=$_FILES['imagem']['tmp_name'];
    $imageSize=$_FILES['imagem']['size'];

    $upload_dir='upload/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $pic=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$pic);  

    if($sistema != 'hide' && !empty($voltagem) && !empty($potencia) && !empty($amperagem) && !empty($marca) 
	&& !empty($bitola) && !empty($fios) && !empty($espiras) && !empty($rpm) && $rotacao != 'hide'
    && $ligacao != 'hide' && $camada != 'hide' && !empty($pic)){
        if($m->msgErro == ""){
            $m->cadastrar($sistema,$marca,$potencia,$voltagem,$amperagem,$bitola,
            $fios,$espiras,$rpm,$rotacao, $ligacao, $camada, $informacoes, $pic)
            ?>
                <script>
                    text.style.color = "green";
                    text.innerText = "Cadastrado com sucesso";
                </script>
            <?php
        } else {
            ?>
                <script>
                    text.innerText = <?php echo "Erro: ".$m->msgErro; ?>;
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
    }
?>