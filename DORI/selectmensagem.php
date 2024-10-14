<?php
// ... (conexão com o banco de dados)

// Consulta SELECT para buscar todas as mensagens
$sql = "SELECT * FROM mensagens";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Se houver resultados, exibe-os em uma tabela HTML
    echo "<table><tr><th>Nome</th><th>Email</th><th>Mensagem</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nome"] . "</td><td>" . $row["email"] . "</td><td>" . $row["mensagem"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhuma mensagem encontrada.";
}

// ... (fecha a conexão com o banco de dados)
?>