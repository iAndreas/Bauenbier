<!DOCTYPE html>
	<?php include 'conf/conf.inc.php';
		  include 'valida.php';
	?>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $tittle; ?></title>
</head>
<body>
	<br> <?php
			echo "<h1 class='center-align'>Bem-vindo, ".$_SESSION['nome']."!</h1>";
			echo "<br>";
			echo "<center><h4>Sobre sua conta:</h4>";
			echo "Usuário: ".$_SESSION['usuario'];
			echo "<br></center>";
		?>
</body>
</html>
