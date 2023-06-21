<?php

include_once "conexao.php";


$nome="";
$senha="";
$email="";

$acao=2;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="validar.js"></script>
  <title>Document</title>
</head>

<body style=" background-image: url(imagens/pexels-skylar-kang-6207368.jpg);">
  <div class="container">
    <form class="container" action="valida_cadastro.php?acao=<?=$acao?>" method="post" onsubmit="return validarFormulario()">
    <div class="login">
        <h1 class="">CADASTRO</h1>

        <div>
        <p>Nome</p>
          <input type="text" name="nome" placeholder="Digite seu nome" value="<?=$nome?>" required>
          
        </div>
        <hr>
        <div>
        <p>Email</p>
          <input type="email" name="email" placeholder="Digite seu Email" value="<?=$email?>" required>
          
        </div>
        <hr>
       
        <div>
        <p>Senha</p>
          <input type="password" name="senha" placeholder="Crie uma senha" value="<?=$senha?>" required>
          
        </div>
        <div class="button-cadastro">
          <button class="sub-tarefas"  type="submit">Salvar</button>
        </div>
        <?php
        if(isset($_GET['erro'])) {
          ?>
          <div class="alert alert-success">
            <?php
            echo "Usuário já cadastrado!";
          }
          ?>
        </div>
      </form>
    </div>
  </body>

  </html>
