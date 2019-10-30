<?php
include 'funcoes_calculo.php';
//https://aterradacerveja.com.br/brassagem/como-calcular-ibu-cerveja-artesanal.html/
$i=0;
$IBU_total=0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
for ($i=0; $i < count($_POST['formulario']); $i++) {

    $volume_em_litros[$i] = ''; // VOLUME
    if (isset($_POST["formulario"][$i]["volume_em_litros"]))
      $volume_em_litros[$i] = $_POST["formulario"][$i]['volume_em_litros'];

    $dencidade_mosto_pre_fervura[$i] = ''; // DENSIDADE MOSTO ANTES DA FERVURA
    if (isset($_POST["formulario"][$i]["dencidade_mosto_pre_fervura"]))
      $dencidade_mosto_pre_fervura[$i] = $_POST["formulario"][$i]["dencidade_mosto_pre_fervura"];

    $tempo_fervura[$i] = ''; // TEMPO DE FERVURA
    if (isset($_POST["formulario"][$i]["tempo_fervura"]))
         $tempo_fervura[$i] = $_POST["formulario"][$i]["tempo_fervura"];

    $peso_lupulo_g[$i] = ''; // MASSA DE LÚPULO
    if (isset($_POST["formulario"][$i]["peso_lupulo_g"]))
			$peso_lupulo_g[$i] = str_replace(",",".",$_POST["formulario"][$i]["peso_lupulo_g"]);

    $alfa_acido[$i] = ''; // QUANTIDADE DE ALFA ACIDOS (OLHAR NA EMBALAGEM)
    if (isset($_POST["formulario"][$i]["alfa_acido"]))
        $alfa_acido[$i] = str_replace(",",".",$_POST["formulario"][$i]["alfa_acido"]);


if ($volume_em_litros[$i]!='' && $peso_lupulo_g[$i]!='' && $alfa_acido[$i]!='' && $dencidade_mosto_pre_fervura[$i]!='' && $tempo_fervura[$i]!='') {

    // PESO DO LIPULO DEVE SER EM MILIGRAMAS
    $peso_lupulo_mg[$i] = Unidade_medida_g_para_mg($peso_lupulo_g[$i]);

    // UNIDADE DE ALFA ACIDO É %
    $A[$i] = Unidade_medida_porcent_para_decimal($alfa_acido[$i]);

    $U[$i] = Utilizacao_IBU ($dencidade_mosto_pre_fervura[$i], $tempo_fervura[$i]);

    $IBU[$i] = Calcula_IBU($U[$i],$A[$i],$peso_lupulo_mg[$i],$volume_em_litros[$i]);

  $IBU_total += $IBU[$i];
}

}
}

?>

<html>
  <head>
    <?php
    session_start();
    if (isset($_SESSION['usuario']))
      header("location:index.php");
   ?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon"  href="img/icone.png">
    <link rel="stylesheet" href="css/css.css">
    <link href="css/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <title>TCC</title>
  </head>

        <body class="blue-grey lighten-5">
          <nav class="grey darken-4" role="navigation">
            <div class="nav-wrapper container">
              <a id="lvolume_em_litroso-container" href="#" class="brand-lvolume_em_litroso">Bauenbier</a>
              <ul class="right hide-on-med-and-down">
                <li class="active tooltipped" data-position="bottom" data-tooltip="Página Inicial"><a href="#"> <i class="material-icons">home</i></a></li>
                <li class="tooltipped" data-position="bottom" data-tooltip="Cálculos"><a href="#"> <i class="material-icons">create</i></a></li>
                <li class="tooltipped" data-position="bottom" data-tooltip="Sobre nós"><a href="sobre.php"> <i class="material-icons">info</i></a></li>
                <li class="tooltipped" data-position="bottom" data-tooltip="Minha Conta"><a href="#modal1" class="modal-trigger"> <i class="material-icons">account_circle</i></a></li>
              </ul>

              <ul id="nav-mobile" class="sidenav">
                <li><h3 class="black-text text-darken-4 center-align">Bauenbier</h3></li><br>
                <li class="active"><a href="#">Página Inicial</a></li>
                <li><a href="#">Cálculos</a></li>
                <li><a href="sobre.php">Sobre Nós</a></li>
                <li><a href="#">Lvolume_em_litrosin</a></li>
              </ul>
              <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
          </nav>
          <div class="container white" style="width: 100%; border-radius: 0px 0px 10px 10px; box-shadow: 0px 8px 15px lightgrey;">
            <div class="container">
              <h1 class="center-align">Cálculo: Amargor (IBU)</h1><br><br>
              <div class="wrapper">

              <form action="" method="post">
              <div id="clone-form">
                    <div id="clonedForm" class="calculaIBU" style="margin-top: 10px;">
              <?php $i = 0; ?>
                <div id="">
                    <div id="" class="" style="margin-top: 10px;">
                      <h3>Cálculo IBU[0]</h3>
                      <hr style="margin-bottom: 20px;" class="hr-color2"/>
                      <div class="input-field">
                        <label for="volume_em_litros">Volume (L)</label>
                        <input type="number" name="formulario[0][volume_em_litros]" id="volume_em_litros" step=".01" value="<?php echo $volume_em_litros[$i]; ?>"  data-constraints="@Required">
                      </div>
                      <div class="input-field">
                        <label for="dencidade_mosto_pre_fervura">OG (Densidade Original)</label>
                        <input type="number" name="formulario[0][dencidade_mosto_pre_fervura]" id="dencidade_mosto_pre_fervura" step = "any" min="0.0000" max="2.9999" value="<?php echo $dencidade_mosto_pre_fervura[$i]; ?>"  data-constraints="@Required">
                      </div>
                      <div class="input-field">
                        <label for="tempo_fervura">Tempo de Fervura (Min)</label>
                        <input type="number" name="formulario[0][tempo_fervura]" id="tempo_fervura" value="<?php echo $tempo_fervura[$i]; ?>"  data-constraints="@Required">
                    </div>
                      <div class="input-field">
                        <label for="peso_lupulo_g">Massa do Lúpulo (g)</label>
                        <input type="number" step=".001" name="formulario[0][peso_lupulo_g]" id="peso_lupulo_g" value="<?php echo $peso_lupulo_g[$i]; ?>"  data-constraints="@Required">
                      </div>
                      <div class="input-field">
                        <label for="alfa_acido">Alfa Ácido (%)</label>
                        <input type="number" step=".01" name="formulario[0][alfa_acido]" id="alfa_acido" value="<?php echo $alfa_acido[$i]; ?>"  data-constraints="@Required">
                      </div>
                      <br>
                      </div>
                      </div>
              <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { for ($i=1; $i < count($_POST['formulario']); $i++) {
                    ?>

                      <h3>Cálculo IBU[0]</h3>
                      <hr style="margin-bottom: 20px;" class="hr-color2"/>
                      <div class="input-field">
                        <label for="volume_em_litros">Volume (L)</label>
                        <input type="number" name="formulario[0][volume_em_litros]" id="volume_em_litros" step=".01" value="<?php echo $volume_em_litros[$i]; ?>"  data-constraints="@Required">
                      </div>
                      <div class="input-field">
                        <label for="dencidade_mosto_pre_fervura">OG (Densidade Original)</label>
                        <input type="number" name="formulario[0][dencidade_mosto_pre_fervura]" id="dencidade_mosto_pre_fervura" step = "any" min="0.0000" max="2.9999" value="<?php echo $dencidade_mosto_pre_fervura[$i]; ?>"  data-constraints="@Required">
                      </div>
                      <div class="input-field">
                        <label for="tempo_fervura">Tempo de Fervura (Min)</label>
                        <input type="number" name="formulario[0][tempo_fervura]" id="tempo_fervura" value="<?php echo $tempo_fervura[$i]; ?>"  data-constraints="@Required">
                      </div>
                      <div class="input-field">
                        <label for="peso_lupulo_g">Massa do Lúpulo (g)</label>
                        <input type="number" step=".001" name="formulario[0][peso_lupulo_g]" id="peso_lupulo_g" value="<?php echo $peso_lupulo_g[$i]; ?>"  data-constraints="@Required">
                      </div>
                      <div class="input-field">
                        <label for="alfa_acido">Alfa Ácido (%)</label>
                        <input type="number" step=".01" name="formulario[0][alfa_acido]" id="alfa_acido" value="<?php echo $alfa_acido[$i]; ?>"  data-constraints="@Required">
                      </div>
                      <br>
                      <?php }} ?>
                    </div>
                  </div>
                  <button type="button" class="clonador btn waves-effect waves-light amber darken-3">Adicionar IBU
                    <i class="material-icons right">add</i>
                  </button>
                  <button class="btn waves-effect waves-light amber darken-3" type="submit" name="acao">Enviar
                    <i class="material-icons right">send</i>
                  </button>
              </form>
              </div>

    <?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($volume_em_litros!='' && $peso_lupulo_g!='' && $alfa_acido!='' && $dencidade_mosto_pre_fervura!='' && $tempo_fervura!='') {
          echo "<br/><b>Resultado:</b> O IBU obtido foi de ".number_format(round($IBU_total, 2), 2, ',', '.')." IBU<hr>";
        }
      }
    ?>
<br/><br/><br/>
  </div>

  </div>


  </div>

    <!--  Scripts-->

    <script>
    $(document).ready(function(){

    var elm_html = $('#clone-form').html();   //faz uma cópia dos elementos a serem clonados.

    $(document).on('click', '.clonador', function(e){
        e.preventDefault();
        var i = $('.calculaIBU').length;    //pega a quantidade de clones;
        var elementos = elm_html.replace(/\[[0\]]\]/g, '['+i+++']');  //substitui o valor dos index e incrementa++
        $('#clone-form').append(elementos);  //exibe o clone.
    });
    });
    </script>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="js/config.js"></script>
  </body>
  </html>
