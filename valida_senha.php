<?php
include_once "conexao.php";
session_start();

$userID = $_SESSION['id'];
$con =new conexao();

$sql = "select senha from usuarios WHERE id = $userID";
$res = $con->executar($sql);

$senha_atual = $_POST['senha_atual'];
$senha_nova = $_POST['senha_nova'];

$resultado = $con->executar($sql);
if ($resultado && count($resultado) > 0 && $resultado[0]['senha'] == $senha_atual) {
  $resultados = $con->executar("select * from usuarios WHERE senha = '{$senha_atual}'");
  if (count($resultados) > 0) {
    $con->executar("update usuarios set senha = '{$senha_nova}' WHERE id = {$_SESSION['id']}");
    header('Location: listartarefa.php');
  }  
}else{
  header('Location: recuperars.php');
  echo "senha inválida!";   
}