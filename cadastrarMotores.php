<?php
session_start();
if(!isset($_SESSION['id_user'])){
    header("location: index.php");
    exit;
} else { 
    require_once 'CLASSES/Motores.php';
    $m = new Motor;
    include 'Conecta.php';

    function limpar_texto($str){ 
        return preg_replace('/[^\d,-]/i', "", $str); 
    }
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

    <title>Pagina de Cadastro de Motores</title>
</head>
<body>
    <header>
        <a href="menu.php"><img src="images/logo.png"></a>
        <h1>Cadastro de Motores</h1>
        <a href="menu.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
    </header>
    <div class="container">
        <form method="POST" id="form" enctype="multipart/form-data">
            <div class="box" id="box">
                <div class="content">
                    
                    <div class="row">
                        <div class="input">
                            <label>Cliente</label>
                            <input type="text" name="cliente" id="cliente">
                        </div>
                        <div class="input">
                            <label>Sistema</label>
                            <select name="sistema" id="sistema">
                                <option value="hide">Selecione</option>
                                <option value="Monof??sico">Monof??sico</option>
                                <option value="Trif??sico">Trif??sico</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input">
                            <label>Pot??ncia</label>
                            <input type="number" name="potencia" id="potencia">
                        </div>
                        <div class="input">
                            <label>Voltagem</label>
                            <input type="text" name="voltagem" id="voltagem">
                        </div>
                    </div>

                    <div class="row">
                        <div class="input">
                            <label>Marca</label>
                            <input type="text" name="marca" id="marca">
                        </div>
                        <div class="input">
                            <label>Amperagem</label>
                            <input type="text" name="amperagem" id="amperagem">
                        </div>
                    </div>

                    <div class="row">
                        <div class="input">
                            <label>RPM</label>
                            <input type="number" name="rpm" id="rpm">
                        </div>
                        <div class="input">
                            <label>Sentido de Rota????o</label>
                            <select name="rotacao" id="rotacao">
                                <option value="hide">Selecione</option>
                                <option value="Hor??rio">Hor??rio</option>
                                <option value="Anti-Hor??rio">Anti-hor??rio</option>
                                <option value="N??o informado">N??o informado</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input">
                            <label>Esquema de liga????o</label>
                            <select name="ligacao" id="ligacao">
                                <option value="hide">Selecione</option>
                                <option value="S??rie">S??rie</option>
                                <option value="Paralelo">Paralelo</option>
                            </select>
                        </div>
                        <div class="input">
                            <label>Camada</label>
                            <select name="camada" id="camada">
                                <option value="hide">Selecione</option>
                                <option value="??nica">??nica</option>
                                <option value="Dupla">Dupla</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input">
                            <label>Informa????es opcionais</label>
                            <input type="text" name="informacoes" id="informacoes">
                        </div>
                        <div class="input">
                            <div class="inputfile">
                                <label for="imagem">Importar imagem</label>
                                <input type="file" id="imagem" name="imagem">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input">
                            <label>N?? Bitola Principal</label>
                            <input type="text" name="bitolaP" id="bitolaP">
                        </div>
                        <div class="input" id="bitolaA">
                            <label>N?? Bitola Auxiliar</label>
                            <input type="text" name="bitolaA" id="bitolaAux">
                        </div>
                    </div>

                    <div class="row">
                        <div class="input">
                            <label>N?? de Fios Principal</label>
                            <input type="number" name="fiosP" id="fiosP">
                        </div>
                        <div class="input" id="inputfiosA">
                            <label>N?? de Fios Auxiliar</label>
                            <input type="number" name="fiosA" id="fiosA">
                        </div>
                    </div>

                    <div class="row">
                        <div class="input" id="inputespiras">
                            <label>N?? de Espiras Principal</label>
                            <div class="box-add">
                                <div class="field">
                                    <input type="number" name="espirasP[]" id="espirasP">
                                </div>
                                <div class="button-box">
                                    <input type="button" name="submit" id="submit" value="+" onclick="add_more()">
                                </div>
                            </div>	
                            <input type="hidden" id="box_count" value="1">
                        </div>
                        <div class="input" id="inputespirasA">
                            <label>N?? de Espiras Auxiliar</label>
                            <div class="box-add">
                                <div class="field">
                                    <input type="number" name="espirasA[]" id="espirasA">
                                </div>
                                <div class="button-box">
                                    <input type="button" name="submitA" id="submit2A" value="+" onclick="add_more2()">
                                </div>
                            </div>	
                            <input type="hidden" id="box_countA" value="1">
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
        var tamanho = 700;

        function add_more(){
            var box_count=jQuery("#box_count").val();
            if(box_count < 6){
                box_count++;
                tamanho+=5;
                jQuery("#box_count").val(box_count);
                jQuery("#inputespiras").append('<div class="box-add" id="box_loop_'+box_count+'"><div class="field"><input type="number" name="espirasP[]" id="espiras"></div><div class="button-box-r"><input type="button" name="submit" id="submit" value="X" onclick=remove_more("'+box_count+'")></div></div>');   
                document.getElementById("box").style.height=tamanho+"px";
            }
        }
        function remove_more(box_count){
            jQuery("#box_loop_"+box_count).remove();
            var box_count=jQuery("#box_count").val();
            box_count--;
            tamanho-=5;
            jQuery("#box_count").val(box_count);
            document.getElementById("box").style.height=tamanho+"px";
        }

        function add_more2(){
            var box_count2=jQuery("#box_countA").val();
            if(box_count2 < 6){
                box_count2++;
                tamanho+=5;
                jQuery("#box_countA").val(box_count2);
                jQuery("#inputespirasA").append('<div class="box-add" id="box_loop2_'+box_count2+'"><div class="field"><input type="number" name="espirasA[]" id="espirasA"></div><div class="button-box-r"><input type="button" name="submitA" id="submitA" value="X" onclick=remove_more2("'+box_count2+'")></div></div>');   
                document.getElementById("box").style.height=tamanho+"px";
            }
        }
        function remove_more2(box_count2){
            jQuery("#box_loop2_"+box_count2).remove();
            var box_count2=jQuery("#box_countA").val();
            box_count2--;
            tamanho-=5;
            jQuery("#box_countA").val(box_count2);
            document.getElementById("box").style.height=tamanho+"px";
        }
    </script>
    <script src="SCRIPT/scriptcadmotor.js"></script>
</body>
<?php
if(isset($_POST['salvar'])){
    $sistema =  addslashes(strip_tags($_POST['sistema']));
    $potencia = addslashes(strip_tags($_POST['potencia']));
    $voltagem = addslashes(strip_tags($_POST['voltagem']));
    $amperagem =  addslashes(strip_tags($_POST['amperagem']));
	$bitolaP = addslashes(strip_tags($_POST['bitolaP']));
	$fiosP = strip_tags($_POST['fiosP']);
    $espirasP = implode("-", $_POST["espirasP"]);
    $bitolaA = addslashes(strip_tags($_POST['bitolaA']));
	$fiosA =strip_tags( $_POST['fiosA']);
    $espirasA = implode("-", $_POST["espirasA"]);
    $marca = addslashes(strip_tags($_POST['marca']));
    $rpm = addslashes(strip_tags($_POST['rpm']));
    $rotacao = addslashes(strip_tags($_POST['rotacao']));
    $ligacao = addslashes(strip_tags($_POST['ligacao']));
    $camada = addslashes(strip_tags($_POST['camada']));
    $informacoes = addslashes(strip_tags($_POST['informacoes']));
    $cliente = addslashes(strip_tags($_POST['cliente']));
    
    $images=$_FILES['imagem']['name'];
    $tmp_dir=$_FILES['imagem']['tmp_name'];
    $imageSize=$_FILES['imagem']['size'];

    $upload_dir='upload/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $pic=rand(1000, 1000000).".".$imgExt; 

    if($sistema != 'hide' && !empty($cliente) && !empty($voltagem) && !empty($potencia) 
    && !empty($amperagem) && !empty($marca) && !empty($bitolaP) && !empty($fiosP) 
    && !empty($espirasP) && !empty($bitolaA) && !empty($fiosA) && !empty($espirasA) 
    && !empty($rpm) && $rotacao != 'hide'&& $ligacao != 'hide' && $camada != 'hide' && !empty($images)){
        if($m->msgErro == ""){
            $potencia = limpar_texto($potencia);
            $voltagem = limpar_texto($voltagem);
            $amperagem = limpar_texto($amperagem);
            $rpm = limpar_texto($rpm);
            $bitolaP = limpar_texto($bitolaP);
            $bitolaA = limpar_texto($bitolaA);
            $espirasP = limpar_texto($espirasP);
            $espirasA = limpar_texto($espirasA); 
            $potencia .= "kW";
            $voltagem .= "V";
            $amperagem .= "A";
            $rpm.= "RPM";
            move_uploaded_file($tmp_dir, $upload_dir.$pic); 
            if($m->cadastrar($sistema,$marca,$potencia,$voltagem,$amperagem,$bitolaP,
            $fiosP,$espirasP, $bitolaA,$fiosA,$espirasA,$rpm,$rotacao, $ligacao, 
            $camada, $informacoes, $pic,$cliente)){
                ?>
                    <script>
                        text.style.color = "green";
                        text.innerText = "Cadastrado com sucesso";
                    </script>
                <?php
            } else {
                ?>
                    <script>
                        text.innerText = "Esse motor j?? foi cadastrado";
                    </script>
                <?php
            }
           
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