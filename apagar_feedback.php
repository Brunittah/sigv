<?php
// Verificar se o ID do feedback foi recebido via GET
if (isset($_GET['id'])) {
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

    // Receber e validar o ID do feedback
    $id = $_GET['id'];

    // Preparar e executar a query SQL para deletar o feedback
    $sql = "DELETE FROM feedbacks WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirecionar de volta para admin.php com parâmetro de sucesso
        header("Location: admin.php?alert=deleted&id=$id");
        exit;
    } else {
        echo "Erro ao remover feedback: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
} else {
    // Se o ID do feedback não foi recebido via GET, redirecionar para admin.php
    header("Location: admin.php");
    exit;
}
?>
