<?php
// Verificar se o formulário foi submetido via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "feedback";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Receber e validar os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $empresa = $_POST['empresa'];
    $ano_cliente = $_POST['ano_cliente'];
    $opiniao = $_POST['opiniao'];

    // Preparar e executar a query SQL para atualizar o feedback
    $sql = "UPDATE feedbacks SET nome='$nome', empresa='$empresa', ano_cliente='$ano_cliente', opiniao='$opiniao' WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        // Feedback atualizado com sucesso, redirecionar para admin.php
        header("Location: admin.php");
        exit;
    } else {
        echo "Erro ao atualizar feedback: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
} else {
    // Se o formulário não foi submetido via POST, redirecionar para admin.php
    header("Location: admin.php");
    exit;
}
?>
