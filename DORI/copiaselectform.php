<!DOCTYPE html>
<html>
<head>
    <title>Formulário e Exibição de Mensagens</title>
    <style>
        /* Estilos CSS para os cards */
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            padding: 20px;
            margin: 10px;
        }

        .card-header {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-body {
            font-size: 16px;
        }
    </style>
</head>
<body>

<h2>Envie sua mensagem</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" required><br><br>
    <label for="mensagem">Mensagem:</label>
    <textarea name="mensagem" rows="5" required></textarea><br><br>
    <input type="submit" value="Enviar">
</form>

<?php
include_once('config.php');
// Processar o formulário se o método for POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Preparar e executar a consulta SQL para inserir a mensagem
    $sql = "INSERT INTO mensagens (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem: " . $conn->error;
    }
}

// Consulta SELECT para buscar todas as mensagens
$sql = "SELECT * FROM contato";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Mensagens Enviadas</h2>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<div class='card-header'>Mensagem de " . $row["nome"] . "</div>";
        echo "<div class='card-body'>";
        echo "<p>Email: " . $row["email"] . "</p>";
        echo "<p>Mensagem: " . $row["mensagem"] . "</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Nenhuma mensagem encontrada.";
}

$conn->close();
?>

</body>
</html>