<!DOCTYPE html>
<html>
<head>
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
        <li class="tooltipped" data-position="bottom" data-tooltip="Página Inicial"><a href="index.php"> <i class="material-icons">home</i></a></li>
        <li class="tooltipped" data-position="bottom" data-tooltip="Cálculos"><a href="#"> <i class="material-icons">create</i></a></li>
        <li class="active tooltipped" data-position="bottom" data-tooltip="Sobre nós"><a href="#"> <i class="material-icons">info</i></a></li>
        <li class="tooltipped" data-position="bottom" data-tooltip="Minha Conta"><a href="index.php" class="modal-trigger"> <i class="material-icons">account_circle</i></a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><h3 class="black-text text-darken-4 center-align">Bauenbier</h3></li><br>
        <li class="active"><a href="#">Página Inicial</a></li>
        <li><a href="#">Cálculos</a></li>
        <li><a href="sobre.php">Sobre Nós</a></li>
        <li><a href="#">Login</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="container center-align white" style="width: 100%; border-radius: 0px 0px 10px 10px; box-shadow: 0px 8px 15px lightgrey;">
    <br><br>
    <h1>Nossa Equipe</h1>
    <br><br>
    <div class="row">
      <div class="col s6">
        <img src="img/andre.jpg" alt="" width="100px" class="circle" style="box-shadow: 5px 5px 20px 0px #888888;">
        <h4>André Gonçalves</h4>
        <h6>Desenvolvedor Front-end</h6>
        <br>
        <i class="material-icons" style="vertical-align: -6px;">mail</i>&ensp;andregehgoncalvesz@gmail.com
      </div>
      <div class="col s6">
        <img src="img/cristian.jpg" alt="" width="100px" class="circle" style="box-shadow: 5px 5px 20px 0px #888888;">
        <h4>Cristian Piehowiak</h4>
        <h6>Desenvolvedor Back-end</h6>
        <br>
        <i class="material-icons" style="vertical-align: -6px;">mail</i>&ensp;cristianpie2002@gmail.com
      </div>
    </div>
    <br><br>
  </div>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script src="js/config.js"></script>
</body>
</html>
