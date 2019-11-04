 <!DOCTYPE html>
 <?php
  include 'connect/connect.php';
  $titulo = "Integração com BD";
  if ($_GET['v'] == '1') {
    if ($_GET['e'] == '213') {
      echo "foi";
      ?><script>
       alert('Este nome de usuario já existe');
     </script>
 <?php
    }
  }
  ?>
 <html>

 <head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="icon" href="img/icone.png">
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
         <li class="tooltipped" data-position="bottom" data-tooltip="Sobre nós"><a href="sobre.php"> <i class="material-icons">info</i></a></li>
         <li class="tooltipped" data-position="bottom" data-tooltip="Minha Conta"><a href="#modal1" class="modal-trigger"> <i class="material-icons">account_circle</i></a></li>
       </ul>

       <ul id="nav-mobile" class="sidenav">
         <li>
           <h3 class="black-text text-darken-4 center-align">Bauenbier</h3>
         </li><br>
         <li class="active"><a href="#">Página Inicial</a></li>
         <li><a href="#">Cálculos</a></li>
         <li><a href="sobre.php">Sobre Nós</a></li>
         <li><a href="#">Login</a></li>
       </ul>
       <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
     </div>
   </nav>
   <div class="container white" style="width: 100%; border-radius: 0px 0px 10px 10px; box-shadow: 0px 8px 15px lightgrey;">
     <center>
       <div class="postagem">
         <h1>Cadastre-se!</h1>
         <br>
         <form method="get" action="acaoInserir.php" id="form">
           <div class="row">
             <div class="input-field col s6">
               <input placeholder="Usuário" name="n1" id="n1" type="text" class="validate" required="true">
               <label for="first_name">Usuário</label>
             </div>
             <div class="input-field col s6">
               <input placeholder="Senha" name="n2" id="n2" type="password" class="validate" required="true">
               <label for="last_name">Senha</label>
             </div>
           </div>
           <div class="row">
             <div class="input-field col s12">
               <input placeholder="Nome Completo" name="n3" id="n3" type="text" class="validate" required="true">
               <label for="password">Nome Completo</label>
             </div>
           </div>
           <input type="hidden" name="tabela" value="<?php echo $GLOBALS['tb_usuario'] ?>">
           <input type="hidden" name="pagina" value="cadUser.php">
           <input type="hidden" name="numero" value="5"><!-- MUDAR PARA QUANTIDADE DE CAMPOS -->
           <input type="hidden" name="n4" id="n4" placeholder="Data hj" required="true" readonly value="<?php echo date('d/m/Y') ?>">
           <input type="hidden" name="n5" id="n5" placeholder="Data hj" required="true" readonly value="<?php echo date('d/m/Y') ?>">
           <button class="btn-small waves-effect waves-light amber darken-3" type="submit" name="acao" value="salvar">Enviar
             <i class="material-icons right">send</i>
           </button>
           &nbsp; &nbsp; &nbsp;
           <a href="index.php">Já tenho cadastro</a>
         </form>
       </div>
     </center>
     <br><br><br>
   </div>
   <!--  Scripts-->
   <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   <script src="js/materialize.js"></script>
   <script src="js/init.js"></script>
   <script src="js/config.js"></script>
 </body>

 </html>
 <!--
     Página para cadastro de usuario

-->