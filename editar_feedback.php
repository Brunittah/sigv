<?php
// Verificar se o ID do feedback foi recebido via GET
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID de feedback não especificado.";
    exit;
}

$id = $_GET['id'];

// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta SQL para obter os dados do feedback pelo ID
$sql = "SELECT ID, nome, empresa, ano_cliente, opiniao FROM feedbacks WHERE ID = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $empresa = $row['empresa'];
    $ano_cliente = $row['ano_cliente'];
    $opiniao = $row['opiniao'];
} else {
    echo "Feedback não encontrado.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Feedback</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <div class="container">
            <h1 id="logo">Editar Feedback</h1>
            <div id="menu-toggle">&#9776;</div>
            <nav id="menu">
                <ul>
                <li><a href="index.html">Inicio</a></li> <!-- Link para a página inicial -->
                    <li><a href="sobre.html">Sobre nós</a></li> <!-- Link para a página "Sobre nós" -->
                    <li><a href="informacao.html">Informações</a></li> <!-- Link para a página de informações -->
                    <li><a href="contactar.html">Contactar nos</a></li> <!-- Link para a página de contato -->
                    <li><a href="galeria.html">Galeria</a></li> <!-- Link para a página de galeria -->
                    <li><a href="feedback.php">FeedBack de clientes</a></li> <!-- Link para a página de feedback -->
                    <li><a href="parcerias.html">Parcerias</a></li> <!-- Link para a página de parcerias -->
                    <li><a href="admin.php">Administração</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="editar-feedback">
        <div class="container">
            <h2>Editar Feedback</h2>
            <form id="editarFeedbackForm" method="POST" action="processar_edicao_feedback.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>

                <label for="empresa">Empresa:</label>
                <input type="text" id="empresa" name="empresa" value="<?php echo $empresa; ?>" placeholder="Empresa (opcional)">

                <label for="ano_cliente">Ano de início como cliente:</label>
                <input type="number" id="ano_cliente" name="ano_cliente" value="<?php echo $ano_cliente; ?>" placeholder="Ano de início como cliente" min="1899" max="9999">

                <label for="opiniao">Sua Opinião:</label>
                <textarea id="opiniao" name="opiniao" required><?php echo $opiniao; ?></textarea>

                <input type="submit" value="Salvar Alterações" id="editarEnviarFeedback">
            </form>
            
            <form id="editarFeedbackForm" method="POST" action="processar_edicao_feedback.php">

        </div>
    </section>

    <footer>
        <div class="container">
            <p>Este não é o site oficial da SIGV</p>
            <img src="https://sigv.pt/wp-content/uploads/2020/09/logo_20191204_070818.png" alt="Logo SIGV">
            <p>Para acesso ao site oficial clique aqui: <a href="https://sigv.pt">SIGV</a></p>
            <p>Outros acessos: <a href="https://sigv.pt/contatos/">Contato</a> | <a href="https://sigv.pt/gal/">Sobre Nós</a> | <a href="https://sigv.pt/politica-de-privacidade/">Política de Privacidade</a></p>
            <p>&copy; 2024 Tecnologias. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>

</html>
