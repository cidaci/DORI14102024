<?php

include_once('config.php');


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form   
    
    $nomeReservatorio = $_POST["nome_reservatorio"];
    $leitura1 = $_POST["leitura1"];
    $leitura2 = $_POST["leitura2"];
    $leitura3 = $_POST["leitura3"];
    $padrao = $_POST["padrao"];

    // Prepare and execute an SQL statement to insert data
    $sql = "INSERT INTO amostras (nome_reservatorio, leitura1, leitura2, leitura3, padrao) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdddd", $nomeReservatorio, $leitura1, $leitura2, $leitura3, $padrao);
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
        echo "Data inserted successfully.";
    } else {
        echo "Error:  " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Formulário de Reservatório</title>
  <link rel="stylesheet" href="amostra.css">
</head>
<body>
  <br>
  <br>
  <br>
  <h1>Formulário de Reservatório</h1>
  <form action="amostra.php" method="post">
  
   
    <div class="form-group">
      <label for="nome_reservatorio">Nome do Reservatório:</label>
      <input type="text" id="nome_reservatorio" name="nome_reservatorio" required>
    </div>

    <div class="leitura">
    <div class="form-group">
        <label for="padrao">PADRÃO</label>
        <input type="double" id="padrao" name="padrao" >
      </div>
      <div class="form-group">
        <label for="leitura1">Leitura 1</label>
        <input type="double" id="leitura1" name="leitura1" required>
      </div>
      <div class="form-group">
        <label for="leitura2">Leitura 2</label>
        <input type="double" id="leitura2" name="leitura2" required>
      </div>
      <div class="form-group">
        <label for="leitura3">Leitura 3</label>
        <input type="double" id="leitura3" name="leitura3" required>
      </div>
      
    </div>
    <button type="submit">Enviar</button>
  </form>
</body>
</html>