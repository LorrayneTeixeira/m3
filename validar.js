function validarFormulario() {
  var email = document.getElementsByName("email")[0].value;
  var nome = document.getElementsByName("nome")[0].value;
  var senha = document.getElementsByName("senha")[0].value;

  var erroEmail = document.getElementById("erroEmail");
  var erroNome = document.getElementById("erroNome");
  var erroSenha = document.getElementById("erroSenha");

  var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  var validacao = true;

  if (!regexEmail.test(email)) {
    erroEmail.textContent = "Email inválido";
    validacao = false;
  } else {
    erroEmail.textContent = "";
  }

  if (nome.trim() === "") {
    erroNome.textContent = "Nome é obrigatório";
    validacao = false;
  } else {
    erroNome.textContent = "";
  }

  if (senha.trim() === "") {
    erroSenha.textContent = "Senha é obrigatória";
    validacao = false;
  } else {
    erroSenha.textContent = "";
  }

  return validacao;
}
function validarFormularioLogin() {
  var email = document.getElementsByName("email")[0].value;
  var senha = document.getElementsByName("senha")[0].value;

  var erroEmail = document.getElementById("erroEmail");
  var erroSenha = document.getElementById("erroSenha");

  var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  var validacao = true;

  if (!regexEmail.test(email)) {
    erroEmail.textContent = "Email inválido";
    validacao = false;
  } else {
    erroEmail.textContent = "";
  }

  if (senha.trim() === "") {
    erroSenha.textContent = "Senha é obrigatória";
    validacao = false;
  } else {
    erroSenha.textContent = "";
  }

  return validacao;
}
function validarFormulario_tarefa() {
  var nometarefa = document.getElementById("nometarefa").value;
  var descricao = document.getElementById("descricao").value;
  var dataCriacao = document.getElementById("data_criacao").value;
  var dataConclusao = document.getElementById("data_conclusao").value;
  var mensagemErro = "";

  if (nometarefa.trim() === "") {
    mensagemErro = "Por favor, preencha o campo Nome da tarefa.";
    document.getElementById("erro-nometarefa").textContent = mensagemErro;
    return false;
  }

  if (descricao.trim() === "") {
    mensagemErro = "Por favor, preencha o campo Descrição.";
    document.getElementById("erro-descricao").textContent = mensagemErro;
    return false;
  }

  if (dataCriacao === "") {
    mensagemErro = "Por favor, selecione a Data de Criação.";
    document.getElementById("erro-data_criacao").textContent = mensagemErro;
    return false;
  }

  if (dataConclusao === "") {
    mensagemErro = "Por favor, selecione a Data de Conclusão.";
    document.getElementById("erro-data_conclusao").textContent = mensagemErro;
    return false;
  }

  return true;
}
function validarSenha(senha) {
  if (senha.length < 6) {
    alert("A senha deve ter pelo menos 6 caracteres.");
    return false;
  }
  if (!/[A-Z]/.test(senha)) {
    alert("A senha deve conter pelo menos uma letra maiúscula.");
    return false;
  }
  if (!/\d/.test(senha)) {
    alert("A senha deve conter pelo menos um número.");
    return false;
  }
  return true;
}
document.querySelector("form").addEventListener("submit", function (event) {
  var senhaNova = document.querySelector("[name=senha_nova]").value;
  if (!validarSenha(senhaNova)) {
    event.preventDefault();
  }
});
function classificarTarefa() {
  // mostrar o elemento ao passar o mouse
  document
    .getElementById("classificacao")
    .addEventListener("mouseover", function () {
      document.getElementById("clicar").style.display = "block";
    });

  // esconder o elemento ao retirar o mouse
  document
    .getElementById("classificacao")
    .addEventListener("mouseout", function () {
      document.getElementById("clicar").style.display = "none";
    });
}
function modificarPendencia() {
  var botaoAlterar = document.getElementsByClassName("alterar");
  var botaoCor = document.getElementsByClassName("alterar");
  for (var i = 0; i < botaoAlterar.length; i++) {
    botaoAlterar[i].addEventListener("click", function () {
      var status = this.parentNode.querySelector("#status");

      if (status.innerHTML === "Concluído") {
        status.innerHTML = "Pendente";
      } else {
        status.innerHTML = "Concluído";
      }
      status.style.color = status.innerHTML === "Concluído" ? "green" : "red";
    });
  }
}
function classificarFiltro() {
  // mostrar o elemento ao passar o mouse
  document
    .getElementById("filtros1")
    .addEventListener("mouseover", function () {
      document.getElementById("escolherfiltro").style.display = "block";
    });

  // esconder o elemento ao retirar o mouse
  document.getElementById("filtros1").addEventListener("mouseout", function () {
    document.getElementById("escolherfiltro").style.display = "none";
  });
}
