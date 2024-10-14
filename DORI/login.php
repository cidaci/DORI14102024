<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<header>
    <div class="container-header">
    <nav>  
        <ul>
        <li><a href="index.html">HOME</a></li>
        <li><a href="reserva.php">Reservatório</a></li>
        <li><a href="#">Espécies</a></li>
        <li><a href="Dory.php">Projeto DORI</a></li>
        </ul>
    </nav>
    </div>
</header>

<body>
    <br><br><br>
    <hr>
<div class="container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <label for="usuario">Usuário:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <button type="submit">Entrar</button>
        </form>

        <p>Ainda não tem conta? <a href="cliente.php">Cadastre-se</a></p>
    </div>
</body>
</html>