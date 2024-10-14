
<?php

// Verifica se o formulário foi enviado
if (isset($_POST['enviar'])) {
// Incluir arquivo de configuração
include_once('config.php');

// Preparar dados para inserção
$data = $_POST;

  // Recupera os dados do formulário
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

  // Valida os dados (opcional)
  // ...

  // Prepara o corpo do email
  $corpoEmail = "Nome: $nome\nEmail: $email\nMensagem: $mensagem";

  // Configura o destinatário e o remetente do email
  $destinatario = "contato@seudominio.com.br";
  $remetente = "contato@seudominio.com.br";

  // Envia o email
  if (mail($destinatario, "Contato do Site", $corpoEmail, "From: $remetente")) {
    // Email enviado com sucesso
    echo "<p>Sua mensagem foi enviada com sucesso!</p>";
  } else {
    // Falha ao enviar o email
    echo "<p>Erro ao enviar mensagem. Tente novamente mais tarde.</p>";
  }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DORY</title>
  <link rel="stylesheet" href="dory.css">
</head>
<body>
  <header>
    <h1>PROJETO DORY</h1>
    <nav>
      <ul>
        <li><a href="index.html">HOME</a></li>
        <li><a href="#projetos">Projetos</a></li>
        <li><a href="#eventos">Eventos</a></li>
        <li><a href="#noticias">Notícias</a></li>
        <li><a href="#contato">Contato</a></li>
      </ul>
    </nav>
  </header>

  <section id="sobre">
    <h2>Sobre o Projeto</h2>
    <p>O projeto "Conectando Saberes" propõe uma ponte entre a Universidade e o Ensino Médio Técnico para a cocriação de soluções inovadoras e o desenvolvimento de habilidades essenciais para o futuro.</p>
    <p><strong>Objetivo:</strong></p>
    <ul>
      <li>Promover a colaboração entre alunos universitários e do ensino médio técnico em projetos de pesquisa, desenvolvimento e extensão.</li>
      <li>Incentivar o intercâmbio de conhecimentos e experiências entre diferentes áreas do saber.</li>
      <li>Fortalecer a formação dos participantes, preparando-os para os desafios do mercado de trabalho e da sociedade contemporânea.</li>
      <li>Contribuir para a resolução de problemas reais da comunidade e o desenvolvimento sustentável.</li>
    </ul>
  </section><hr>
    <div class="linha_projeto">
      <section id="projetos">
        <h2>Projetos em Desenvolvimento</h2>
        <div class="projetos">
          <div class="projeto">
            <h3>DORY</h3>
            <p>Resumo do projeto.</p>
            <a href="#">Saiba mais</a>
          </div>
          </div>
      </section>

      <section id="eventos">
        <h2>Eventos</h2>
        <div class="eventos">
          <div class="evento">
            <h3>VISITA TÉCNICA</h3>
            <p>Data, hora e local do evento.</p>
            <a href="#">Saiba mais</a>
          </div>
          </div>
      </section>
      <br><br><br>
      <section id="noticias">
        <h2>Notícias</h2>
        <div class="noticias">
          <div class="noticia">
            <h3>Título da Notícia</h3>
            <p>Resumo da notícia.</p>
            <a href="#">Leia mais</a>
          </div>
          </div>
      </section>
      </div><hr>
<?php
include_once('config.php');
// Processa os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

      
    $sql = "INSERT INTO contato  (nome, email, mensagem) VALUES (?, ?, ?)";

// Preparar consulta
$stmt = $conn->prepare($sql); // Verificar se a preparação foi bem-sucedida
if ($stmt === false) {
  die("Erro ao preparar a instrução SQL: " . $conn->error);
}

// Vincular valores aos placeholders
$stmt->bind_param("sss", $nome, $email, $mensagem );

// Executar a consulta
if (mysqli_stmt_execute($stmt)) {
  // Inserção bem-sucedida
  echo 'Dados do cliente enviados com sucesso!';
} else {
  // Erro na inserção
  echo 'Erro ao enviar os dados do cliente: ' . mysqli_stmt_error($stmt);
}

$stmt->close();
$conn->close(); 
}
?>
  <section id="contato">
    <h2>Contato</h2>
    <p>Entre em contato conosco para dúvidas, sugestões e colaborações.</p>
    <form action="Dory.php" method="post">
      <label for="nome">Nome: </label>
      <input type="text" id="nome" name="nome" required>

      <label for="email">Email: </label>
      <input type="email" id="email" name="email" required>

      <label for="mensagem">Mensagem:</label>
      <textarea id="mensagem" name="mensagem" required></textarea>

      <button type="submit">Enviar</button>
    </form>
  </section>

  <footer>
    <p>&copy; 2024 PROJETO USO ACADÊMICO</p>
  </footer>
</body>
</html>