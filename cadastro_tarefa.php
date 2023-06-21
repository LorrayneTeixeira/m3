<?php

include_once "conexao.php";

$acao=3;
$idtarefa="";
$nometarefa="";
$descricao="";
$data_criacao="";
$data_conclusao="";

if (isset($_GET['tarefa'])) {
  $conexao = new conexao();
  $idtarefa = $_GET['tarefa'];
  $sql = "SELECT * FROM tarefas WHERE id = $idtarefa";
  $bdusu = $conexao->executar($sql);
  if (!empty($bdusu)) {
      $tarefas = $bdusu[0];
      $nometarefa = $tarefas['titulo'];
      $descricao = $tarefas['descricao'];
      $data_criacao = $tarefas['data_criacao'];
      $data_conclusao = $tarefas['data_conclusao'];
      $id = $idtarefa;
      $acao = 4;
      $data_criacao = date('Y-m-d', strtotime($tarefas['data_criacao']));
      $data_conclusao = date('Y-m-d', strtotime($tarefas['data_conclusao']));
  }
}

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

<body>
  
    <form class="container" action="acao.php?acao=<?=$acao?>" method="post" onsubmit="return validarFormulario_tarefa()">
      <input type="hidden" name="id" value="<?= $id ?>">
      <div class="login">
        <h1>Tarefas</h1>

        <div class="formg">
          <div>
            <label for="nome">Nome da tarefa:</label>
            <input type="text" name="nometarefa" id="nometarefa" value="<?= $nometarefa?>">
            
          </div>

          <div>
            <label for="custo">Descrição:</label>
            <input type="text" name="descricao" id="descricao" value="<?= $descricao ?>">
            
          </div>

          <br>

          <div>
            <label for="date">Data Criação:</label>
            <input type="date" name="data_criacao" id="data_criacao" value="<?= $data_criacao ?>">
           
          </div>

          <br>

          <div>
            <label for="date">Data conclusão:</label>
            <input type="date" name="data_conclusao" id="data_conclusao" value="<?= $data_conclusao ?>">
          
          </div>

          <div class="button-cadastro">
            <button type="submit">Cadastrar</button>
          </div><!--button-cadastro-->
        </div>
      </div>
    </form>

</body>

</html>
