<?php
  include 'funcoes_calculo.php';
    $volume_em_litros = ''; // 
    if (isset($_POST["volume_em_litros"]))
      $volume_em_litros = $_POST["volume_em_litros"];

    $kgramas = ''; // 
    if (isset($_POST["kgramas"]))
			$kgramas = $_POST["kgramas"];
    
    $cor_grao = ''; // 
    if (isset($_POST["cor_grao"]))
      $cor_grao = $_POST["cor_grao"];

if ($volume_em_litros!='' && $kgramas!='' && $cor_grao!='') {

    $SRM = Calcula_SRM($volume_em_litros,$kgramas,$cor_grao);
    
    $SRM_aproximado = round($SRM);

    $SRM_hex=Cor_SRM($SRM_aproximado);
    
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
                <div class="input-field">
                  <label for="volume_em_litros">Volume (L)</label>
                  <input type="number" name="volume_em_litros" id="volume_em_litros" step=".01" value="<?php echo $volume_em_litros; ?>">
                </div>
                <div class="input-field">
                  <label for="kgramas">Massa (Kg)</label>
                  <input type="number" step=".001" name="kgramas" id="kgramas" value="<?php echo $kgramas; ?>"><br/>
                </div>
                <div class="input-field">
                  <label for="cor_grao">Coloração do Grão</label>
                  <input type="number" step=".01" name="cor_grao" id="cor_grao" value="<?php echo $cor_grao; ?>"><br/>
                </div>
                
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
