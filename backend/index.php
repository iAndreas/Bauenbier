<!DOCTYPE html>
<?php
	include 'valida_secao.php';
	include 'funcoes.php';
	include 'disciplinas_pdo.php';

?>
<html lang="pt-br">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>Home - nome site</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/img/favicon.png" />

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- CSS -->
	<link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>
	<?php printHeader(); ?>

	<main>
		<div class="container">
			<?php
				echo "<p class='center-align'>Bem vindo, <b>".$_SESSION['nome']."</b>.<br>Usuario: <b>".$_SESSION['usuario']."</b>.<br>	Você logou por ultimo  <b>".$_SESSION['ultimo_login']."</b>.</p>";
			?>

			<?php if($_SESSION['tipo'] == 'aluno') { ?>
				


			<?php } ?>		

			<?php if($_SESSION['tipo'] == 'professor' || $_SESSION['tipo'] == 'aluno') {
				
				$disciplinas = selectDisciplinas($_SESSION['matricula'], $_SESSION['tipo']);
				//var_dump($disciplinas);
				$contador=count($disciplinas);
					
			 } ?>


		</div>
	</main>

	<footer class="page-footer">
		<?php printFooter(); ?>
	</footer>

	
	
	</body>

</html>
