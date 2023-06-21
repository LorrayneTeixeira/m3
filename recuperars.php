<?php

include_once "conexao.php";
session_start();

$user_id = $_SESSION['id'];

$conexao = new conexao();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <title>Recuperar senha</title>
</head>

<body style=" background-image: url(imagens/pexels-lukas-669614.jpg);">
    <div class="container">
        <form class="container" action="valida_senha.php" method="post">
        <div class="recuperar-senha">
        <h1 class="">Recuperar senha</h1>

        <div class="senha-antiga">
          <p>Senha Atual</p>
          <div class="entrada-nome">
            <input type="password" placeholder="Digite sua senha atual" name="senha_atual" required>
          </div>
          <hr>

          <div class="senha-nova">
          <p>Senha nova</p>
          <div class="entrada-nome">
            <input type="password" placeholder="Digite sua senha nova" name="senha_nova" required>
          </div>
          <hr>
          

          <div class="button-login">
            <button type="submit">Entrar</button>
          </div>
          </div>
        </form>
    </div><!--container-->
    <script src="validar.js"></script>
  </body>

</html>

