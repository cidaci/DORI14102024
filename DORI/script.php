
<?php
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $dados = $_POST['dados'];

    // Define o caminho completo para o script R e a chamada do comando
    // Assumindo que o script R espera os dados como primeiro argumento
   $comando = "R_amostra_dori.R $dados";

    // Executa o comando em segundo plano
    exec($comando . " > /dev/null 2>&1 &");

    echo "Script R iniciado com sucesso!";
}
?>



<button onclick="executarScript()">Executar Script</button>
<script>
function executarScript() {
    function executarScript() {
// Construir os dados a serem enviados (se necessário)
var dados = "valor_dos_dados"; // Substitua por um valor dinâmico se precisar

// Fazer a requisição para o script R
var xhr = new XMLHttpRequest();
xhr.open("POST", "R_amostra_dori.R", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhr.send("dados=" + dados);
    // ... restante do código JavaScript ...

    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log("Script R executado com sucesso!");
        } else {
            console.error("Erro ao executar o script R:", xhr.statusText);
        }
    };
}
}
