<?php

    $OG = 0; // DENSIDADE ORIGINAL
    if (isset($_POST["OG"]))
                $OG = $_POST["OG"];


    $FG = 0; // DENSIDADE FINAL
    if (isset($_POST["FG"]))
				$FG = $_POST["FG"];
    // %ABV = 131,25 * (OG – FG)
    // %ABV = 131,25 * (1,065 – 1,0082)
    // %ABV = 7,455%

    $ABV = 131.25 * ($OG - $FG);


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
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/materialize.min.js"></script>

    <title>TCC</title>

  </head>
        <body class="blue-grey lighten-5">
          <nav class="grey darken-4" role="navigation">
            <div class="nav-wrapper container">
              <a id="logo-container" href="#" class="brand-logo">Bauenbier</a>
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
                <li><a href="#">Login</a></li>
              </ul>
              <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
          </nav>
          <div class="container white" style="width: 100%; border-radius: 0px 0px 10px 10px; box-shadow: 0px 8px 15px lightgrey;">
            <div class="container">
              <h1 class="center-align">Cálculo: Teor Alcoólico</h1><br><br>
              <form action="" method="post">
                <div class="input-field">
                  <label for="OG">OG (Densidade Original)</label>
                  <input type="number" name="OG" id="OG" step = "any" min="0.0000" max="2.9999" value="<?php echo $OG; ?>">
                </div>
                FG (Densidade Final)<input type="number" step = "any" min="0.0000" max="2.9999" name="FG" id="FG" value="<?php echo $FG; ?>"><br/>
                <br/>
                <button class="btn waves-effect waves-light amber darken-3" type="submit" name="acao">Enviar
                  <i class="material-icons right">send</i>
                </button>
              </form>
    <?php
      if ($OG > $FG) {
        echo "<br/><b>Resultado:</b> O teor alcoólico obtido foi de ".number_format(round($ABV, 1), 1, ',', '.')." % ABV"; // round arredonda a variável ($variavel, numero de casas decimais)
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
