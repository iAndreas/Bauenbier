<?php
include 'exeploarray.php';
//https://aterradacerveja.com.br/brassagem/como-calcular-ibu-cerveja-artesanal.html/
    $volume_em_litros = 0; // VOLUME
    if (isset($_POST["volume_em_litros"]))
           echo     $volume_em_litros = $_POST["volume_em_litros"];

    $dencidade_mosto_pre_fervura = 0; // DENSIDADE MOSTO ANTES DA FERVURA
    if (isset($_POST["dencidade_mosto_pre_fervura"]))
          echo      $dencidade_mosto_pre_fervura = $_POST["dencidade_mosto_pre_fervura"];

    $tempo_fervura = 0; // TEMPO DE FERVURA
    if (isset($_POST["tempo_fervura"]))
           echo     $tempo_fervura = $_POST["tempo_fervura"];

    $peso_lupulo_g = 0; // MASSA DE LÚPULO
    if (isset($_POST["peso_lupulo_g"]))
			echo	$peso_lupulo_g = str_replace(",",".",$_POST["peso_lupulo_g"]);
    
    $alfa_acido = 0; // QUANTIDADE DE ALFA ACIDOS (OLHAR NA EMBALAGEM)
    if (isset($_POST["alfa_acido"]))
              echo $alfa_acido = str_replace(",",".",$_POST["alfa_acido"]);
      

if ($volume_em_litros!=0 && $peso_lupulo_g!=0 && $alfa_acido!=0 && $dencidade_mosto_pre_fervura!=0 && $tempo_fervura!=0) {
    
    // PESO DO LIPULO DEVE SER EM MILIGRAMAS
  echo "<br>peso mg ".  $peso_lupulo_mg = $peso_lupulo_g * 1000;

    // UNIDADE DE ALFA ACIDO É %
    echo "<br>aa ". $A = $alfa_acido / 100;
    

    $U = 0;


    $U = Utilizacao ($dencidade_mosto_pre_fervura, $tempo_fervura);
    echo "<br>U ".$U;



    echo "<br>IBU -- ".  $IBU = ($U * $A * $peso_lupulo_mg) / $volume_em_litros;




     

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
    <link href="https://fonts.govolume_em_litrosleapis.com/css?family=Staatliches" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/materialize.min.js"></script>

    <title>TCC</title>
  </head>

        <body class="blue-grey lighten-5">
          <nav class="grey darken-4" role="navigation">
            <div class="nav-wrapper container">
              <a id="lvolume_em_litroso-container" href="#" class="brand-lvolume_em_litroso">Bauenbier</a>
              <ul class="right hide-on-med-and-down">
                <li class="active tooltipped" data-position="bottom" data-tooltip="Página Inicial"><a href="#"> <i class="material-icons">home</i></a></li>
                <li class="tooltipped" data-position="bottom" data-tooltip="Cálculos"><a href="#"> <i class="material-icons">create</i></a></li>
                <li class="tooltipped" data-position="bottom" data-tooltip="Sobre nós"><a href="#"> <i class="material-icons">info</i></a></li>
                <li class="tooltipped" data-position="bottom" data-tooltip="Minha Conta"><a href="#modal1" class="modal-trigger"> <i class="material-icons">account_circle</i></a></li>
              </ul>

              <ul id="nav-mobile" class="sidenav">
                <li><h3 class="black-text text-darken-4 center-align">Bauenbier</h3></li><br>
                <li class="active"><a href="#">Página Inicial</a></li>
                <li><a href="#">Cálculos</a></li>
                <li><a href="#">Sobre Nós</a></li>
                <li><a href="#">Lvolume_em_litrosin</a></li>
              </ul>
              <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
          </nav>
          <div class="container white" style="width: 100%; border-radius: 0px 0px 10px 10px; box-shadow: 0px 8px 15px lightgrey;">
            <div class="container">
              <h1 class="center-align">Cálculo: Amargor (IBU)</h1><br><br>
              <form action="" method="post">
                volume_em_litros <input type="number" step=".001" name="volume_em_litros" id="volume_em_litros" value="<?php echo $volume_em_litros; ?>"><br/>
                dencidade_mosto_pre_fervura <input type="number" step=".001" name="dencidade_mosto_pre_fervura" id="dencidade_mosto_pre_fervura" value="<?php echo $dencidade_mosto_pre_fervura; ?>"><br/>
                tempo_fervura <input type="number" name="tempo_fervura" id="tempo_fervura" value="<?php echo $tempo_fervura; ?>"><br/>
                peso_lupulo_g <input type="number" step=".001" name="peso_lupulo_g" id="peso_lupulo_g" value="<?php echo $peso_lupulo_g; ?>"><br/>
                alfa_acido (%) <input type="number" step=".001" name="alfa_acido" id="alfa_acido" value="<?php echo $alfa_acido; ?>"><br/>
                
                <br/>
                <button class="btn waves-effect waves-light amber darken-3" type="submit" name="acao">Enviar
                  <i class="material-icons right">send</i>
                </button>
              </form>
    <?php
      if ($IBU!=0) {
        echo "<br/><b>Resultado:</b> O IBU obtido foi de ".number_format(round($IBU, 2), 2, ',', '.')." IBU"; 
      }
    ?>
<br/><br/><br/>
  </div>

  </div>


  </div>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="js/config.js"></script>
  </body>
  </html>
