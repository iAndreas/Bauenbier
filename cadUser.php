 <!DOCTYPE html>
  <?php
    include 'connect/connect.php';
    $titulo = "Integração com BD";
    if ($_GET['e']=='213') {
      ?><script>
          alert('Este nome de usuario já existe');
        </script>
      <?php
    }
  ?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="_css/rede.css">
	<title><?php echo $titulo ?></title>
	<meta charset="utf-8">
    <style>

    </style>  
</head>
<body>
	<center> 
		<div class="postagem">
      <h1>Banco de Dados de Estados</h1>
      <hr>
      <form method="get" action="acaoInserir.php" id="form">
        <input type="hidden" name="tabela" value="<?php echo $GLOBALS['tb_usuario'] ?>">
        <input type="hidden" name="pagina" value="cadUser.php">
        <input type="hidden" name="numero" value="5"><!-- MUDAR PARA QUANTIDADE DE CAMPOS -->

        <label for="nome">Usuário:</label><br/>
        <input type="text" name="n1" id="n1" placeholder="usuario" required = "true" value=""> <br/><br/>

        <hr/><label for="nome">Senha:</label><br/>
        <input type="password" name="n2" id="n2" placeholder="senha" required = "true" value=""> <br/><br/>

        <hr/><label for="nome">Nome:</label><br/>
        <input type="text" name="n3" id="n3" placeholder="nome" required = "true" value=""> <br/><br/>

        <input type="hidden" name="n4" id="n4" placeholder="Data hj"  required = "true" readonly value="<?php echo date('d/m/Y') ?>">
        <input type="hidden" name="n5" id="n5" placeholder="Data hj"  required = "true" readonly value="<?php echo date('d/m/Y') ?>">

        
       
        <input type="submit" name="acao" value="salvar">
        &nbsp; &nbsp; &nbsp;
        <a href="index.php">Já tenho cadastro</a>
      </form>
		</div>
	</center>
</body>
</html>
<!--
     Página para cadastro de usuario

-->