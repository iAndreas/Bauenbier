<!DOCTYPE html>
<?php include 'conf/conf.inc.php';
	  include 'connect/connect.php';

		function data($data){
    	return date("d/m/Y", strtotime($data));
		}
?>
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
<body>
	<nav class="grey darken-4" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Bauenbier</a>
			<ul class="right hide-on-med-and-down">
				<li class="active tooltipped" data-position="bottom" data-tooltip="Página Inicial"><a href="index.php"> <i class="material-icons">home</i></a></li>
				<li class="tooltipped" data-position="bottom" data-tooltip="Cálculos"><a href="inicial.php#calculos"> <i class="material-icons">create</i></a></li>
				<li class="tooltipped" data-position="bottom" data-tooltip="Sobre nós"><a href="sobre.php"> <i class="material-icons">info</i></a></li>
				<li class="tooltipped" data-position="bottom" data-tooltip="Minha Conta"><a href="#modal1" class="modal-trigger"> <i class="material-icons">account_circle</i></a></li>
			</ul>

      <ul id="nav-mobile" class="sidenav">
        <li><h3 class="black-text text-darken-4 center-align">Bauenbier</h3></li><br>
        <li class="active"><a href="index.php">Página Inicial</a></li>
        <li><a href="#">Cálculos</a></li>
        <li><a href="sobre.php">Sobre Nós</a></li>
        <li><a href="#">Login</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
<div class="container">

<?php
	include 'menu.php';
	$sql = "SELECT * FROM login";
	$result = mysqli_query($conexao, $sql);
	echo "<center>Último login: ";
	echo data($_SESSION['dataUltima']).'<br/>';
 ?><br>
 <a class="waves-effect waves-light btn-small red darken-3" href="acaoLogin.php?acao=logoff">sair<i class="material-icons right">cancel</i></a></center>
	<br><br>
	<ul class="collection">
    <li class="collection-item avatar">
      <i class="material-icons circle amber accent-4">folder</i>
      <span class="title">Receitas</span>
      <p><a>Minhas receitas</a> <br>
         <a href="inserir_receita.php">Nova receita</a>
      </p>
      <a class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
  </ul>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script src="js/config.js"></script>
</body>
</html>
