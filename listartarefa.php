<?php
include_once "conexao.php";
session_start();
$usuario_id = $_SESSION['id'];

$conexao = new conexao();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-niWZ9lM8hzdOjKv2i9NLexJnm6Kjg8RLh3tbDn+oVzboHhmclF+IC1xKFwWufa1e" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: none;
        }
    </style>
    <title>Tarefas</title>
</head>

<body>
    <h1>Lista de tarefa</h2>
        </br>
        <div class="tab">
    <a href="cadastro_tarefa.php">Criar tarefa</a>
    <div class="esqueceu">
        <span>Trocar a senha?</span>
        <a href="recuperars.php?acao=2">Trocar</a>
    </div>
    <div class="classificacao" id="classificacao">
        <div class="classificar" id="classificar" onmouseover="classificarTarefa()">
            <p>Classificar tarefas</p>
        </div><!--classificar-->
        <div class="clicar" id="clicar" style="display: none;">
            <a href="listartarefa.php?ordem=criacao"><p>Data criação</p></a>
            <a href="listartarefa.php?ordem=conclusao"><p>Data conclusão</p></a>
        </div><!--clicar-->
    </div><!--classificacao-->
</div>
        <div id="filtros1" class="filtros1">
            <a href="listartarefa.php?filtro=pendentes">Mostrar Tarefas Pendentes</a>
            <a href="listartarefa.php?filtro=concluidas">Mostrar Tarefas Concluídas</a>
            <a href="listartarefa.php?filtro=todas">Mostrar todas as tarefas</a>

            <div class="filtros2" onmouseover="classificarFiltro()">
                <p>Filtros</p>
            </div><!--filtros2-->
            <div id="escolherfiltro" class="escolherfiltro" style="display: none;">
                <a href="listartarefa.php?filtro=pendentes">Mostrar Tarefas Pendentes</a>
                <a href="listartarefa.php?filtro=concluidas">Mostrar Tarefas Concluídas</a>
            </div><!--escolherfiltro-->
        </div><!--filtros1-->

            <table>
                <tr>
                    <th>titulo</th>
                    <th>descrição</th>
                    <th><a href="listartarefa.php?ordem=criacao" onclick="classificarTarefa()">Data criação</a></th>
                    <th><a href="listartarefa.php?ordem=conclusao" onclick="classificarTarefa()">Data conclusão</a></th>
                    <th>ALTERAR</th>
                    <th>EXCLUIR</th>
                    <th>STATUS</th>
                </tr>
                <?php
                $ordem = isset($_GET['ordem']) ? $_GET['ordem'] : 'conclusao';
                $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'todas';

                if ($filtro === 'pendentes') {
                    $status = 'Pendente';
                    $arrtarefa = $conexao->executar("SELECT * FROM tarefas WHERE usuario_id ='$usuario_id' AND status = '$status' ORDER BY data_$ordem ASC");
                } elseif ($filtro === 'concluidas') {
                    $status = 'Concluído';
                    $arrtarefa = $conexao->executar("SELECT * FROM tarefas WHERE usuario_id ='$usuario_id' AND status = '$status' ORDER BY data_$ordem ASC");
                } else {
                    $arrtarefa = $conexao->executar("SELECT * FROM tarefas WHERE usuario_id ='$usuario_id' ORDER BY data_$ordem ASC");
                }
                
                foreach ($arrtarefa as $tarefa) {
                // Verificar o status da tarefa e aplicar a filtragem correta
                if (($filtro === 'pendentes' && $tarefa['status'] !== 'Pendente') ||
                ($filtro === 'concluidas' && $tarefa['status'] !== 'Concluído') ||
                ($filtro === 'todas' && ($tarefa['status'] !== 'Pendente' && $tarefa['status'] !== 'Concluído'))) {
                continue; // Pular para a próxima iteração do loop
                }
                ?>

<tr class="tarefa" id="tarefa-<?= $tarefa['id'] ?>">
    <td><?= $tarefa['titulo'] ?></td>
    <td><?php echo $tarefa['descricao']; ?></td>
    <td><?= $tarefa['data_criacao'] ?></td>
    <td><?= $tarefa['data_conclusao'] ?></td>
    <td>
        <a href="cadastro_tarefa.php?tarefa=<?= $tarefa['id'] ?>&acao=6">Alterar</a>
    </td>
    <td>
        <a href="acao.php?tarefa=<?= $tarefa['id'] ?>&acao=5">Excluir</a>
    </td>
    <td class="pendencia">
        <?php if ($tarefa['status'] == 'Pendente'): ?>
            <p id="status">Pendente <span><a href="acao.php?tarefa=<?= $tarefa['id'] ?>&acao=7">Concluir</a></span></p>
        <?php else: ?>
            <p id="status">Concluído <span><a href="acao.php?tarefa=<?= $tarefa['id'] ?>&acao=8">Pendente</a></span></p>
        <?php endif; ?>
    </td>
</tr>
<?php   }
?>