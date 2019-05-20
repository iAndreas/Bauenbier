<!DOCTYPE html>
<html lang="pt-BR">
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
<body>
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

  <div id="index-banner" class="parallax-container" style="height: 700px;">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <center>
        <img src="img/logo.png" class="header center" width="30%" style="margin-bottom: -20px;"></img>
      </center>
        <h1 class="header center white-text" style="font-family:'Staatliches'">Bauenbier: Calculadora para Cervejas Artesanais</h1>
        <div class="row center">
          <a style="border-radius: 10px;" id="download-button" class="modal-trigger btn-large amber darken-3" href="#modal1">Fazer Login</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img style="filter: blur(3px);" src="img/background2.jpg" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Fazer Login</h4><br>
        <div class="row">
    <form class="col s12" action="acaoLogin.php" id="form" method="post">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="user" name="user" type="text" class="validate" value="">
          <label for="user">Nome de Usuário / E-mail</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">https</i>
          <input id="pass" name="pass" type="password" class="validate" value="">
          <label for="pass">Senha</label>
        </div>
      </div>
      <center>
      <button class="btn waves-effect waves-light" type="submit" name="acao" value="login" id="login">Enviar
        <i class="material-icons right">send</i>
      </button>
      </center>
    </form>
  </div>
    </div>
    <div class="modal-footer">
      Não possui uma conta?<a href="cadUser.php"> Cadastre-se</a>&ensp;&ensp;&ensp;
    </div>
  </div>
          
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="medium material-icons">hourglass_full</i></h2>
            <h5 class="center">Otimiza o Processo de Criação</h5>

            <p class="light">O Bauenbier faz os cálculos necessários para a produção de uma cerveja artesanal, tornando o processo muito mais fácil e divertido.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="medium material-icons">group</i></h2>
            <h5 class="center">Focado na Experiência do Usuário</h5>

            <p class="light">No processo de desenvolvimento deste website, tudo foi pensado em pró do usuário, para podermos proporcionar a melhor experiência o possível.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="medium material-icons">build</i></h2>
            <h5 class="center">Ferramentas de Fácil Utilização</h5>

            <p class="light">Todas as ferramentas do site foram desenvolvidas para serem auto-explicativas e de fácil utilização, de forma que fique fácil até mesmo para usuários iniciantes.</p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="parallax"><img style="filter: blur(3px);" src="img/background1.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">
      <h1 class="center-align">Cálculos</h1><br><br>

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">

              <div class="card">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/card3.jpg">
                  </div>
                  <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">IBU<i class="material-icons right">more_vert</i></span>
                    <p class="grey-text text-darken-1">Clique para saber mais.</p>
                  </div>
                  <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">IBU<i class="material-icons right">close</i></span>
                    <p>IBU significa International Bitterness Unit. Traduzindo para o português, unidade internacional de amargor. É pelo IBU que podemos ter uma ideia de o quão amarga é uma cerveja.</p>
                  </div>
                </div>

          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="img/card2.jpg">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">ABV<i class="material-icons right">more_vert</i></span>
                <p class="grey-text text-darken-1">Clique para saber mais.</p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">ABV<i class="material-icons right">close</i></span>
                <p>Alcohol by Volume, ou álcool por volume. É a medida de álcool na cerveja. De maneira geral, as cervejas são classificadas como de baixo, médio e de alto teor alcoólico.</p>
              </div>
            </div>

            </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">

                <div class="card">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/card1.jpg">
                  </div>
                  <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">SRM<i class="material-icons right">more_vert</i></span>
                    <p class="grey-text text-darken-1">Clique para saber mais.</p>
                  </div>
                  <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">SRM<i class="material-icons right">close</i></span>
                    <p>A cor está diretamente ligada à definição do tipo de cerveja, sua receita. Ela também revela o malte utilizado e o seu grau de torreifação.</p>
                  </div>
                </div>

                </div>
            </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="parallax"><img style="filter: blur(3px);" src="img/background3.jpg" alt="Unsplashed background img 3"></div>
  </div>

  <footer class="page-footer grey darken-4">
    <div class="container">
      <div class="row">
        <div class="col l4 s12">
          <h5 class="white-text">Agradecimentos</h5>
          <ul class="grey-text text-lighten-4">
            <li>Logo: <a class="brown-text text-lighten-3" href="#!">Freepik</a></li>
          </ul>


        </div>
        <div class="col l3 offset-l2 s12">
          <h5 class="white-text">Entre em Contato</h5>
          <ul>
            <li><a class="brown-text text-lighten-3" href="#!">Facebook</a></li>
            <li><a class="brown-text text-lighten-3" href="#!">Whatsapp</a></li>
            <li><a class="brown-text text-lighten-3" href="#!">E-mail</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      © Made by: <a class="brown-text text-lighten-3" href="http://materializecss.com">André Gonçalves</a> & <a class="brown-text text-lighten-3" href="http://materializecss.com">Cristian Piehowiak</a>
      </div>
    </div>
  </footer>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/config.js"></script>

  </body>
</html>
