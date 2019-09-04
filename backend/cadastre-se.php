<!DOCTYPE html>
<?php
  date_default_timezone_set('America/Sao_Paulo');

  include 'funcoes.php'; //função usada: printHeader();
 
?>
<html lang="pt-br">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Cadastre-se - Nome do site q eu esqueci</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.png" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- CSS -->
  <link href="assets/css/login/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>
  <?php printHeader(); /*include 'funcoes.php'; lá em cima*/ ?>
    
  <main>

    <center>
    
      <div class="valign-wrapper login container">
        <div class="row">

          <div class="col s12">
            <img src="assets/img/form-avatar.svg" alt="User" class="login--img" />
          </div>
          <div class="col s12" style="margin-top: -2rem"> 
            <h1 class="login--title">Cadastre-se</h1>
          </div>
        

          <div class="col s12 container">
            
              <form action='cervejeiro_pdo.php' method='post'>
              
              <div class="row">
                <div class="input-field col s12 m6">
                  <input id="nome" name="nome" type="text" class="validate" />
                  <label for="nome">Nome</label>
                </div><br/><br/>
                  <div class="input-field col s12 m6">
                    <input id="senha" name="senha" type="password" class="validate" />
                  <label for="senha">Senha</label>
                </div>
              </div><br/><br/><br/>
              <div class="row" style="margin-top: -2rem">
                <div class="input-field col s12 m6">
                  <input id="matricula" name="matricula" type="text" class="validate" />
                  <label for="matricula">Nome de usuário</label>
                </div><br/>
                  <div class="input-field col s12 m6">
                  <input id="email" name="email" type="email" class="validate" />
                  <label for="email">E-Mail</label>
                </div>
              </div><br/><br/><br/>
              <div class="row" style="margin-top: -2rem">
                <div class="input-field col s12 m6 offset-m3">
                  <input id="data_nascimento" name="data_nascimento" type="date" class="validate">
                  <span class="helper-text">Data de nascimento</span>
                  <!--<label for="dataNascimento">Data de Nascimento</label>-->
                </div>
              </div><br/><br/><br/>
              <input type="hidden" name="ultimo_login" id="ultimo_login" value="<?php echo date('Y-m-d H:i:s'); ?>">
              <div class="row" style="margin-top: -2rem">
                <div class="col s12">
                  <p>Já é cadastrado? <a href="login.php">Entre aqui</a></p>
                </div>
              </div><br/><br/>
              <div class="row">
                <div class="col s12 center">
                  <button type="submit" name="acao" value="cadastrar" class="waves-effect waves-light btn">Cadastrar</a>
                </div>
              </div>
            </form>
          </div>

          <?php  ?>
              
        </div>
      </div>
          
    </center>
  </main>

  <footer>

  </footer>
  </body>

</html>
