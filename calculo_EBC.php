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

    $SRM_aproximado = round($SRM);

    $SRM_hex='';
    switch ($SRM_aproximado) {
      case '1':
        $SRM_hex="#fee799";
        break;

      case '2':
        $SRM_hex="#fdd978";
        break;

      case '3':
        $SRM_hex="#fdcb5a";
        break;

      case '4':
        $SRM_hex="#fdcb5a";
        break;

      case '5':
        $SRM_hex="#f7b324";
        break;

      case '6':
        $SRM_hex="#f5a800";
        break;

      case '7':
        $SRM_hex="#ee9e01";
        break;

      case '8':
        $SRM_hex="#e69100";
        break;

      case '9':
        $SRM_hex="#e28800";
        break;

      case '10':
        $SRM_hex="#da7e01";
        break;

      case '11':
        $SRM_hex="#d37400";
        break;

      case '12':
        $SRM_hex="#cb6c00";
        break;

      case '13':
        $SRM_hex="#c66401";
        break;

      case '14':
        $SRM_hex="#bf5c01";
        break;

      case '15':
        $SRM_hex="#b65300";
        break;

      case '16':
        $SRM_hex="#b04f00";
        break;

      case '17':
        $SRM_hex="#ac4701";
        break;

      case '18':
        $SRM_hex="#a24001";
        break;

      case '19':
        $SRM_hex="#9c3900";
        break;

      case '20':
        $SRM_hex="#963500";
        break;
      
      case '21':
        $SRM_hex="#912f00";
        break;

      case '22':
        $SRM_hex="#8f2e00";
        break;

      case '23':
        $SRM_hex="#8e2d00";
        break;

      case '24':
        $SRM_hex="#8b2c00";
        break;

      case '25':
        $SRM_hex="#872900";
        break;

      case '26':
        $SRM_hex="#832501";
        break;

      case '27':
        $SRM_hex="#802101";
        break;

      case '28':
        $SRM_hex="#7e1f01";
        break;

      case '29':
        $SRM_hex="#7b1e01";
        break;

      case '30':
        $SRM_hex="#771c01";
        break;

      case '31':
        $SRM_hex="#741c00";
        break;

      case '32':
        $SRM_hex="#721b00";
        break;

      case '33':
        $SRM_hex="#6f1801";
        break;

      case '34':
        $SRM_hex="#6c1501";
        break;

      case '35':
        $SRM_hex="#6a1301";
        break;

      case '36':
        $SRM_hex="#671000";
        break;

      case '37':
        $SRM_hex="#650f00";
        break;

      case '38':
        $SRM_hex="#620f01";
        break;

      case '39':
        $SRM_hex="#5e0e00";
        break;

      case '40':
        $SRM_hex="#5b0d00";
        break;
      default:
        $SRM_hex="#fff";
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
        if ($SRM_aproximado<6) {
          $cor_texto = "black";
        }else{
          $cor_texto = "white";
        }
        echo "<br/><b>Resultado:</b> A cor obtido foi de 
          <b style='padding: 1rem; color: ".$cor_texto."; background-color: ".$SRM_hex.";'>".number_format(round($SRM, 1), 1, ',', '.')."</b>
          SRM"; // round arredonda a variável ($variavel, numero de casas decimais)
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
