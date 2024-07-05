process_feedback.php
<?php
$servername = "localhost"; // ou o IP do seu servidor MySQL
$username = "root"; // Nome de usuário padrão
$password = ""; // A senha do usuário root (deixe vazio se não tiver senha)
$dbname = "feedback";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Coleta os dados do formulário
$nome = $_POST['nome'];
$empresa = $_POST['empresa'];
$ano_cliente = $_POST['ano_cliente'];
$opiniao = $_POST['opiniao'];

// Prepara a declaração SQL
$stmt = $conn->prepare("INSERT INTO feedbacks (nome, empresa, ano_cliente, opiniao) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $nome, $empresa, $ano_cliente, $opiniao);

// Executa a declaração
if ($stmt->execute()) {
    echo "<script>
            alert('Feedback enviado com sucesso!');
            window.location.href = 'feedback.html';
          </script>";
} else {
    echo "Erro: " . $stmt->error;
} 

// Fecha a declaração e a conexão
$stmt->close();
$conn->close();
?>
