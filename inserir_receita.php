<!DOCTYPE html>
<?php
include 'acaoLogin.php';
include 'connect/connect.php';
include 'funcoes.php';
$tb_tabela = isset($_GET['tabela']) ? $_GET['tabela'] : 'receita';
$campos = isset($_GET['campos']) ? $_GET['campos'] : '(Usuario_idUsuaio,nome,anotacao)';
$title = "Receita";
?>
<html>

<head>
  <?php
  //die(var_dump(isset($_SESSION['usuario'])));

  if (!isset($_SESSION['usuario'])) {
    //header("location:index.php");
  }
  $usuario = '1'; //isset($_SESSION['usuario']);idCervejeiro

  ?>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/icone.png">
  <link rel="stylesheet" href="css/css.css">
  <link href="css/material-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/materialize.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <title><?php echo $title; ?></title>
</head>

<body class="blue-grey lighten-5">
  <nav class="grey darken-4" role="navigation">
    <div class="nav-wrapper container">
      <a id="lvolume_em_litroso-container" href="inicial.php" class="brand-lvolume_em_litroso">Bauenbier</a>
      <ul class="right hide-on-med-and-down">
        <li class="active tooltipped" data-position="bottom" data-tooltip="Página Inicial"><a href="#"> <i class="material-icons">home</i></a></li>
        <li class="tooltipped" data-position="bottom" data-tooltip="Cálculos"><a href="#"> <i class="material-icons">create</i></a></li>
        <li class="tooltipped" data-position="bottom" data-tooltip="Sobre nós"><a href="#"> <i class="material-icons">info</i></a></li>
        <li class="tooltipped" data-position="bottom" data-tooltip="Minha Conta"><a href="#modal1" class="modal-trigger"> <i class="material-icons">account_circle</i></a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li>
          <h3 class="black-text text-darken-4 center-align">Bauenbier</h3>
        </li><br>
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
      <h1 class="center-align"><?php echo $title; ?></h1><br><br>
      <div class="wrapper">
        <form method="get" action="acao.php" id="form">
          <input type="hidden" name="tabela" value="<?php echo $tb_tabela ?>">
          <input type="hidden" name="campos" value="<?php echo $campos ?>">
          <input type="hidden" name="pagina" value="inserir_receita.php">
          <input type="hidden" name="numero" value="3">
          <input type="hidden" name="n1" value="<?php echo $usuario ?>">

          <div class="input-field">
            <label for="n2">Nome</label>
            <input input type="text" name="n2" id="n2" placeholder="Exemplo: Ipa IV" required="true" value="" data-constraints="@Required">
          </div>
          <div class="input-field">
            <label for="n3">Anotação</label>
            <input input type="text" name="n3" id="n3" placeholder="Exemplo: Melhor IPA" required="true" value="" data-constraints="@Required">
          </div>
          <!-- TEXT AREA -->
          <button class="btn waves-effect waves-light amber darken-3" type="submit" name="acao" value="salvar">Enviar
            <i class="material-icons right">send</i>
          </button>

        </form>
      </div>

      <br /><br /><br />
    </div>

  </div>


  </div>


  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/config.js"></script>
</body>

</html>