    <?php
    include 'acaoLogin.php';
    include 'connect/connect.php';
    include 'funcoes.php';
        session_start();
        //die(var_dump($_SESSION['codigo']));
        echo $codigoUsuario = codigoUsuario($_SESSION['usuario']);

 
        geraSelectReceita($codigoUsuario,'idreceita','nome','n2');
/*
        $sql = "SELECT nome FROM receita WHERE Usuario_codigo = '".$codigoUsuario."'";
        $result = mysqli_query($GLOBALS['conexao'],$sql);
        while ($row = mysqli_fetch_array($result)) {
            return $row['codigo'];
        }	
            */
    ?>