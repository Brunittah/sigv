<?php
// Verifique se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "feedback";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Preparar os dados recebidos
    $nome = $_POST['nome'];
    $empresa = $_POST['empresa'];
    $ano_cliente = $_POST['ano_cliente'];
    $opiniao = $_POST['opiniao'];

    // SQL para inserir o feedback
    $sql = "INSERT INTO feedbacks (nome, empresa, ano_cliente, opiniao) VALUES ('$nome', '$empresa', '$ano_cliente', '$opiniao')";

    if ($conn->query($sql) === TRUE) {
        // Obter o ID do novo feedback inserido
        $last_id = $conn->insert_id;

        // Montar o HTML da nova linha da tabela
        $newRowHTML = "<tr>";
        $newRowHTML .= "<td>" . $last_id . "</td>";
        $newRowHTML .= "<td>" . $nome . "</td>";
        $newRowHTML .= "<td>" . $empresa . "</td>";
        $newRowHTML .= "<td>" . $ano_cliente . "</td>";
        $newRowHTML .= "<td>" . $opiniao . "</td>";
        $newRowHTML .= "<td><a href='editar_feedback.php?id=" . $last_id . "' class='btn'>Editar</a> ";
        $newRowHTML .= "<a href='apagar_feedback.php?id=" . $last_id . "' class='btn btn-delete'>Apagar</a></td>";
        $newRowHTML .= "</tr>";

        // Retornar o HTML da nova linha
        echo $newRowHTML;
    } else {
        echo "Erro ao adicionar feedback: " . $conn->error;
    }

    $conn->close();
}
?>
