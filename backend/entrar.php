<!DOCTYPE html>
<?php
	include 'funcoes.php';

	$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
	$senha = isset($_POST['senha']) ? sha1($_POST['senha']) : '';
	$tipo_usuario = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : '';

	if (isset($_POST['erro'])) { $erro = $_POST['erro']; }
	else if (isset($_GET['erro'])) { $erro = $_GET['erro']; }
?>

<html lang="pt-br">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>Entrar - Bauenbier</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/img/favicon.png" />

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- CSS -->
	<link href="assets/css/login/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>
	<?php printHeader(); ?>
	
	<main>
	<center>

		<div class="valign-wrapper login container">
			<div class="row">

				<div class="col s12">
					<img src="assets/img/avatar.svg" alt="User" class="login--img" />
				</div>
				<div class="col s12" style="margin-top: -2rem"> 
					<h1 class="login--title">Entrar</h1>
				</div>

				<div class="col s12 m6 offset-m3 container">
					<form action="" method="post">
						<input type="hidden" name="ultimo_login" id="ultimo_login" value="<?php echo date('Y-m-d H:i:s'); ?>">
						<div class="row">
							<div class="input-field col s12">
								<input id="usuario" name="usuario" type="text" class="validate">
								<label for="usuario">Nome de usuário</label>
							</div>
						</div><br/><br/>
						<div class="row" style="margin-top: -2rem">
							<div class="input-field col s12">
								<input id="senha" name="senha" type="password" class="validate">
								<label for="senha">Senha</label>
							</div>
						</div>
            <br/>
            <?php if(isset($erro)) { if($erro == '1') { ?>
	            <br/>
	            <div class="row" style="margin-top: -2rem">
								<div class="col s12 card-panel red white-text">
									<p><b>Erro: </b> A senha informada está incorreta</p>
								</div>
							</div>
						<?php } } ?>
						<div class="row" style="margin-top: -2rem">
							<div class="col s12">
								<p><a href="">Esqueci minha senha</a></p>
								<p>Ainda não é cadastrado? <a href="cadastre-se.php">Cadastre-se aqui</a></p>
							</div>
						</div>
						<div class="row">
							<div class="col s12 center">
								<button type="submit" name="acao" value="login" class="waves-effect waves-light btn">Entrar</a>
							</div>
						</div>
					</form>
				</div>

				<?php
					if($usuario != '' && $senha != '') {
						if (isset($_GET['acao'])) $acao = $_GET['acao'];
						else if (isset($_POST['acao'])) $acao = $_POST['acao'];
						else $acao = '';

						if ($acao == 'login') {
							include 'cervejeiro_pdo.php';
							$linha_usuario = selectPDO_alun('usuario',$usuario);
						}
							//var_dump($linha_usuario);

							if ($senha == $linha_usuario[0][1]) {
								session_start();
								$_SESSION['usuario'] = $usuario;
								$_SESSION['nome'] = $linha_usuario[0][2];
								header("location:index.php");
							} else {
								header("location:entrar.php?erro=1");
							}
						}
					
				?>

			</div>
		</div>

	</center>
	</main>

	<footer class="page-footer">
		<?php printFooter(); ?>
	</footer>

	</body>

</html>
