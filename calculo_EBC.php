<?php

    $volume_em_litros = 0; // 
    if (isset($_POST["volume_em_litros"]))
                $volume_em_litros = $_POST["volume_em_litros"];

    $kgramas = 0; // 
    if (isset($_POST["kgramas"]))
				$kgramas = $_POST["kgramas"];
    
    $cor_grao = 0; // 
    if (isset($_POST["cor_grao"]))
                $cor_grao = $_POST["cor_grao"];

if ($volume_em_litros!=0 && $kgramas!=0 && $cor_grao!=0) {
    

    // COR
    $volume_gal = $volume_em_litros * 3.785411784;// CONVERSSÃO DE LITROS PARA GALÃO    
    $peso_grao = ($kgramas * 1000) * 0.0022046;

    $UCM = ($peso_grao/*(em libras)*/ * $cor_grao/*(em graus lovibond)*/) / $volume_gal /*(em galões americano)*/;
    //|\\ Para cervejas leves, o UCM apresenta uma boa estimativa de cor SRM, entretanto quando a coloração da cerveja ultrapassa 6-8 SRM, você precisa fazer uma correção utilizando a equação de Morey.
    $SRM=0;
    $SRM = 1.4922 * ($UCM ** 0.6859);

    $SRM_hex='';
    switch ($SRM) {
      case '1':
        $SRM_hex= ;
        break;

      case '2':
        $SRM_hex= ;
        break;

      case '3':
        $SRM_hex= ;
        break;

      case '4':
        $SRM_hex= ;
        break;

      case '5':
        $SRM_hex= ;
        break;

      case '6':
        $SRM_hex= ;
        break;

      case '7':
        $SRM_hex= ;
        break;

      case '8':
        $SRM_hex= ;
        break;

      case '9':
        $SRM_hex= ;
        break;

      case '10':
        $SRM_hex= ;
        break;

      case '11':
        $SRM_hex= ;
        break;

      case '12':
        $SRM_hex= ;
        break;

      case '13':
        $SRM_hex= ;
        break;

      case '14':
        $SRM_hex= ;
        break;

      case '15':
        $SRM_hex= ;
        break;

      case '16':
        $SRM_hex= ;
        break;

      case '17':
        $SRM_hex= ;
        break;

      case '18':
        $SRM_hex= ;
        break;

      case '19':
        $SRM_hex= ;
        break;

      case '20':
        $SRM_hex= ;
        break;
      
      case '21':
        $SRM_hex= ;
        break;

      case '22':
        $SRM_hex= ;
        break;

      case '23':
        $SRM_hex= ;
        break;

      case '24':
        $SRM_hex= ;
        break;

      case '25':
        $SRM_hex= ;
        break;

      case '26':
        $SRM_hex= ;
        break;

      case '27':
        $SRM_hex= ;
        break;

      case '28':
        $SRM_hex= ;
        break;

      case '29':
        $SRM_hex= ;
        break;

      case '30':
        $SRM_hex= ;
        break;

      case '31':
        $SRM_hex= ;
        break;

      case '32':
        $SRM_hex= ;
        break;

      case '33':
        $SRM_hex= ;
        break;

      case '34':
        $SRM_hex= ;
        break;

      case '35':
        $SRM_hex= ;
        break;

      case '36':
        $SRM_hex= ;
        break;

      case '37':
        $SRM_hex= ;
        break;

      case '38':
        $SRM_hex= ;
        break;

      case '39':
        $SRM_hex= ;
        break;

      case '40':
        $SRM_hex= ;
        break;
      default:
        $SRM_hex= ;
        break;
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
              <h1 class="center-align">Cálculo: Teor Alcoólico</h1><br><br>
              <form action="" method="post">
                volume_em_litros <input type="number" name="volume_em_litros" id="volume_em_litros" value="<?php echo $volume_em_litros; ?>"><br/>
                kgramas <input type="number" name="kgramas" id="kgramas" value="<?php echo $kgramas; ?>"><br/>
                cor_grao <input type="number" name="cor_grao" id="cor_grao" value="<?php echo $cor_grao; ?>"><br/>
                
                
                <br/>
                <button class="btn waves-effect waves-light amber darken-3" type="submit" name="acao">Enviar
                  <i class="material-icons right">send</i>
                </button>
              </form>
    <?php
      if ($volume_em_litros > $kgramas) {
        echo "<br/><b>Resultado:</b> A cor obtido foi de ".number_format(round($SRM, 1), 1, ',', '.')."  SRM"; // round arredonda a variável ($variavel, numero de casas decimais)
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
