<?php
 // Incluir arquivo de configuração
 include_once('config.php');
// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome_cliente = $_POST["nome_cliente"];
    $data_nascimento = $_POST["data_nascimento"];
    $nome_propriedade = $_POST["nome_propriedade"];
    $endereco = $_POST["endereco"];
    $senha = $_POST["senha"];
    $confirmar_senha = $_POST["confirmar_senha"];
    
    // Criar a instrução SQL para inserir os dados
    $sql = "INSERT INTO clientes (nome_cliente, data_nascimento, nome_propriedade, endereco, senha, confirmar_senha) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Preparar consulta
    $stmt = $conn->prepare($sql); // Verificar se a preparação foi bem-sucedida
    if ($stmt === false) {
        die("Erro ao preparar a instrução SQL: " . $conn->error);
    }

    // Vincular valores aos placeholders
    $stmt->bind_param("ssssss", $nome_cliente, $data_nascimento, $nome_propriedade, $endereco, 
    $senha, $confirmar_senha);

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


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Cliente</title>
  <link rel="stylesheet" href="style_cliente.css">
</head>
<body>
  <h1>Formulário de Cliente</h1>
   <form action="cliente.php" method="post">
    <?php if (isset($errors['all_fields_required'])): ?>
      <p style="color: red;">Erro: Todos os campos são obrigatórios.</p>
    <?php endif; ?>
    <?php if (isset($errors['passwords_dont_match'])): ?>
      <p style="color: red;">Erro: Senhas não coincidem.</p>
    <?php endif; ?>
    <label for="nome_cliente">Nome do Usuário:</label>
    <input type="text" id="nome_cliente" name="nome_cliente" 
           value="<?php echo isset($old_data['nome_cliente']) ? $old_data['nome_cliente'] : ''; ?>" required>

    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" id="data_nascimento" name="data_nascimento" 
           value="<?php echo isset($old_data['data_nascimento']) ? $old_data['data_nascimento'] : ''; ?>" required>

    <label for="nome_propriedade">Nome da Propriedade:</label>
    <input type="text" id="nome_propriedade" name="nome_propriedade" 
           value="<?php echo isset($old_data['nome_propriedade']) ? $old_data['nome_propriedade'] : ''; ?>" required>
    
    <label for="endereco">Endereço:</label>
    <input type="text" id="endereco" name="endereco" 
           value="<?php echo isset($old_data['endereco']) ? $old_data['endereco'] : ''; ?>" required>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>

    <label for="confirmar_senha">Confirmar Senha:</label>
    <input type="password" id="confirmar_senha" name="confirmar_senha" required>

    <button type="submit">Enviar</button>
    <br>
    <p>Ainda não tem conta? <a href="login.php">login</a></p>
  </form>
  
</body>
</html>