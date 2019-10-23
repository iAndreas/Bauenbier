<!DOCTYPE html>
<?php
    include 'connect/connect.php';
    include 'funcoes.php';
    $tb_tabela = isset($_GET['tabela'])?$_GET['tabela']:0;
    $campos = isset($_GET['campos'])?$_GET['campos']:'(valor, descricao, codigobarra, marca)';
    $title = "Receita";
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
    <script src="js/jquery.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <title><?php echo $title; ?></title>
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
              <h1 class="center-align"><?php echo $title; ?></h1><br><br>
              <div class="wrapper">
              <form method="get" action="acaoMarca.php" id="form">
                <input type="hidden" name="tabela" value="<?php echo $tb_tabela ?>">
                <input type="hidden" name="campos" value="<?php echo $campos ?>">
                <input type="hidden" name="pagina" value="inindex2.php">
                <input type="hidden" name="numero" value="4">
            <div id="clone-form">
    <div id="clonedForm" class="cadastroGato" style="margin-top: 10px;">
      
      <hr style="margin-bottom: 20px;" class="hr-color2"/>
      <div class="input-field">
        <label for="n1">Nome</label>
        <input input type="text" name="n1" id="n1" placeholder="Exemplo: Ipa IV" required = "true" value="" data-constraints="@Required">
      </div>
      <div class="input-field">
        <label for="dencidade_mosto_pre_fervura">OG (Densidade Original)</label>
        <input type="number" name="formulario[0][dencidade_mosto_pre_fervura]" id="dencidade_mosto_pre_fervura" step = "any" min="0.0000" max="2.9999" value="<?php echo $dencidade_mosto_pre_fervura; ?>"  data-constraints="@Required">
      </div>
      <div class="input-field">
        <label for="tempo_fervura">Tempo de Fervura (Min)</label>
        <input type="number" name="formulario[0][tempo_fervura]" id="tempo_fervura" value="<?php echo $tempo_fervura; ?>"  data-constraints="@Required">
     </div>
      <div class="input-field">
        <label for="peso_lupulo_g">Massa do Lúpulo (g)</label>
        <input type="number" step=".001" name="formulario[0][peso_lupulo_g]" id="peso_lupulo_g" value="<?php echo $peso_lupulo_g; ?>"  data-constraints="@Required">
      </div>
      <div class="input-field">
        <label for="alfa_acido">Alfa Ácido (%)</label>
        <input type="number" step=".01" name="formulario[0][alfa_acido]" id="alfa_acido" value="<?php echo $alfa_acido; ?>"  data-constraints="@Required">
      </div>
      <br>
      <button type="button" class="clonador btn waves-effect waves-light amber darken-3">Adicionar IBU
        <i class="material-icons right">add</i>
      </button>
      <button class="btn waves-effect waves-light amber darken-3" type="submit" name="acao">Enviar
        <i class="material-icons right">send</i>
      </button>
    </div>
  </div>
              </form>
              </div>
    <?php
      if ($volume_em_litros!='' && $peso_lupulo_g!='' && $alfa_acido!='' && $dencidade_mosto_pre_fervura!='' && $tempo_fervura!='') {
        echo "<br/><b>Resultado:</b> O IBU obtido foi de ".number_format(round($IBU, 2), 2, ',', '.')." IBU";
      }
    ?>
<br/><br/><br/>
  </div>

  </div>


  </div>


    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="js/config.js"></script>
  </body>
  </html>













<head>
  <link rel="stylesheet" type="text/css" href="_css/rede.css">
	<title><?php echo $title; ?></title>
	<meta charset="utf-8">
  
</head>
<body>
	<center> 
		<div class="postagem">
      <h1><?php echo $title; ?></h1>
      
      <form method="get" action="acaoMarca.php" id="form">
        <input type="hidden" name="tabela" value="<?php echo $tb_tabela ?>">
        <input type="hidden" name="campos" value="<?php echo $campos ?>">
        <input type="hidden" name="pagina" value="inindex2.php">
        <input type="hidden" name="numero" value="4"><!-- MUDAR PARA QUANTIDADE DE CAMPOS -->



        

        <hr/><label for="nome">Valor:</label><br/>
        <input type="text" name="n1" id="n1" placeholder="Exemplo: 50.00" required = "true" value=""> <br/><br/>

        <hr/><label for="nome">Descrição:</label><br/>
        <input type="text" name="n2" id="n2" placeholder="Exemplo: Placa" required = "true" value=""> <br/><br/>

        <hr/><label for="nome">Código de Barras:</label><br/>
        <input type="text" name="n3" id="n3" placeholder="Exemplo: 369554" required = "true" value=""> <br/><br/> <hr/>
        <?php
            //$contexto(marca) = isset($_GET["codigo"])?$_GET["codigo"]:"1";
            //geraSelect("nome da tabela",$contexto(valor do codigo),"codigo","descricao","nome para select");
          $codigo = isset($_GET["codigoMarca"])?$_GET["codigoMarca"]:"1";
          geraSelect("Marca",$codigo,"codigoMarca","descricao","n4"/*,"codigo_estado",$id*/);
        ?>  

        <br/>
       
        <input type="submit" name="acao" value="salvarestrangeiro">
        &nbsp; &nbsp; &nbsp;
        <a href="index.php"><img src="img/iconpesquisa.png" class="icon" height="40px" /></a>
      </form>
		</div>
	</center>
</body>
</html>
<!--
 
      
      



-->
