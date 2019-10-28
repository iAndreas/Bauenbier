<?php
  include 'conf/conf.inc.php';
  include 'connect/connect.php';


  $acao = '';
  if (isset($_GET["acao"]))
    $acao = $_GET["acao"];

  if (isset($_GET["tabela"]))
    $tabela = $_GET["tabela"];

  $tb_tabela = isset($_GET['tabela'])?$_GET['tabela']:0;
  $campos = isset($_GET['campos'])?$_GET['campos']:0;

  $pagina = isset($_GET['pagina'])?$_GET['pagina']:0;
  

  $numero = isset($_GET['numero'])?$_GET['numero']:0;
  $parentesa = "(";
  $parentesf = ")";

  if (isset($_GET["nome"]))
    $nome = $_GET["nome"];

  if ($acao == "excluir"){
    $codigo = 0;
    if (isset($_GET["acao"])){
      $codigo = $_GET["codigo"];
      $sql = "DELETE FROM $tb_tabela WHERE codigo = $codigo";
      echo $sql;
      $result = mysqli_query($conexao, $sql);
      header ("location:".$nome);
    }
  }

  if ($acao == "excluirestrangeiro"){
    $codigoCompra = 0;
    if (isset($_GET["acao"])){
      $codigoCompra = $_GET["codigoCompra"];
      $sql = "DELETE FROM $tb_tabela WHERE codigoCompra = $codigoCompra";
      echo $sql;
      $result = mysqli_query($conexao, $sql);
      header ("location:".$nome);
    }
  }


   if ($acao == 'salvar') {
      $tb_tabela = isset($_GET['tabela'])?$_GET['tabela']:0;
      $pagina = isset($_GET['pagina'])?$_GET['pagina']:0;
      $numero = isset($_GET['numero'])?$_GET['numero']:0;
      if (isset($_GET['n1'])) {
          for ($i= 1; $i <= $numero ; $i++) {
              $lugares[$i] = isset($_GET['n'.$i])?$_GET['n'.$i]:0;
          }
          $sql = "INSERT INTO ".$tb_tabela." ".$campos." VALUES ".$parentesa;
          $i=1;
          while ($i <= $numero) {
              $data = DateTime::createfromFormat('d/m/Y', $lugares[$i]);
              if ($data && $data->format('d/m/Y')) {
                  $lugares[$i] = str_replace("/", "-", $lugares[$i]);
                  $sql.= ",'".date("Y-m-d", strtotime($lugares[$i]))."'";
              } else {
                if ($i==$numero) {
                  $sql.= "'".$lugares[$i]."'";
                }else
                  $sql.= "'".$lugares[$i]."', ";
              }
              $i++;
          }
          $sql.= $parentesf;
          echo $sql;
          $resultado = mysqli_query($conexao, $sql);
          header("location:".$pagina."?tabela=$tb_tabela");
      }
  }


  if ($acao == 'salvarestrangeiro') {
      $tb_tabela = isset($_GET['tabela'])?$_GET['tabela']:0;
      $pagina = isset($_GET['pagina'])?$_GET['pagina']:0;
      $numero = isset($_GET['numero'])?$_GET['numero']:0;
      if (isset($_GET['n1'])) {
          for ($i= 1; $i <= $numero ; $i++) {
              $lugares[$i] = isset($_GET['n'.$i])?$_GET['n'.$i]:0;
          }
          $sql = "INSERT INTO ".$tb_tabela." ".$campos." VALUES ".$parentesa;
          $i=1;
          while ($i <= $numero) {
              $data = DateTime::createfromFormat('d/m/Y', $lugares[$i]);
              if ($data && $data->format('d/m/Y')) {
                  $lugares[$i] = str_replace("/", "-", $lugares[$i]);
                  $sql.= ",'".date("Y-m-d", strtotime($lugares[$i]))."'";
              } else {
                if ($i==$numero) {
                  $sql.= "'".$lugares[$i]."'";
                }else
                  $sql.= "'".$lugares[$i]."', ";
              }
              $i++;
          }
          $sql.= $parentesf;
          echo $sql;
          $resultado = mysqli_query($conexao, $sql);
          header("location:".$pagina."?tabela=$tb_tabela");
      }
  }

  ?>