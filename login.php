<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <script src="validar.js"></script>
    <title>Tela de Login</title>
</head>

<body style=" background-image: url(imagens/pexels-lukas-669614.jpg);">
    <div class="container">
        <form class="container" action="valida_login.php" method="post" onsubmit="return validarFormularioLogin()">
        <div class="login">
        <h1 class="">LOGIN</h1>

        <div class="nome">
          <p>Nome</p>
          <div class="entrada-nome">
            <input type="text" placeholder="Digite seu nome" name="nome" required>
          </div>
          <hr>
          

          <div class="email">
            <p>Email</p>
            <div class="entrada-email">
              <input type="text" placeholder="Digite seu email" name="email" required>
            </div>
            <hr>

          </div>
          <div class="senha">
            <p>Senha</p>
            <div class="entrada-senha">
              <input type="password" placeholder="Digite sua senha" name="senha" required>
            </div>
          </div>

          <div class="button-login">
            <button type="submit">Entrar</button>
          </div>



          <div class="esqueceu">
            <span>Ainda não tem conta?</span>
            <a href="cadastro.php?acao=2">Criar usuario</a>
          </div>
                <?php
                if(isset($_GET['acao']) ){
                ?>
                <div class="alert alert-success">
                    <?php
                    if($_GET['acao']==1)
                    {
                        echo "criado com sucesso!";
                    }
                    if($_GET['acao']==2)
                    {
                        echo "Usuário e/ou senha inválido(s)!";
                    }
                    ?>
                </div>
                <?php
                }
                ?>
            </div>
        </form>
    </div>
</body>

</html>
