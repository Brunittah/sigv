<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração de Feedbacks</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Estilos simples para esconder o formulário inicialmente */
        #add-feedback {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1 id="logo">Administração de Feedbacks</h1>
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
                    <li><a href="login.php" >Administração</a></li>
                    <li><a href="logout.php">Logout</a></li> <!-- Link para a página de logout -->
                </ul>
            </nav>
        </div>
    </header>

    <section id="admin">
        <div class="container">
            <h2>Gerenciar Feedbacks</h2>

            <!-- Botão para abrir o formulário de adicionar feedback -->
            <button onclick="toggleAddFeedbackForm()">Adicionar Novo Feedback</button>

            <!-- Formulário para adicionar novo feedback -->
            <form id="addFeedbackForm" style="display:none;">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Seu nome" required><br><br>
                
                <label for="empresa">Empresa:</label>
                <input type="text" id="empresa" name="empresa" placeholder="Empresa (opcional)"><br><br>
                
                <label for="ano_cliente">Ano de início como cliente:</label>
                <input type="number" id="ano_cliente" name="ano_cliente" placeholder="Ano de início como cliente" min="1899" max="9999"><br><br>
                
                <label for="opiniao">Sua Opinião:</label><br>
                <textarea id="opiniao" name="opiniao" placeholder="Deixe sua opinião" required></textarea><br><br>
                
                <input type="button" value="Enviar" onclick="enviarFeedback()">
                <input type="button" value="Cancelar" onclick="cancelarAdicionar()">
            </form>

            <!-- Tabela para listar os feedbacks existentes -->
            <h3>Lista de Feedbacks</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Empresa</th>
                    <th>Ano Cliente</th>
                    <th>Opinião</th>
                    <th>Opções</th>
                </tr>
                <?php
                // Conexão com o banco de dados
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "feedback";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Consulta SQL para obter os feedbacks
                $sql = "SELECT ID, nome, empresa, ano_cliente, opiniao FROM feedbacks";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['ID'] . "</td>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['empresa'] . "</td>";
                        echo "<td>" . $row['ano_cliente'] . "</td>";
                        echo "<td>" . $row['opiniao'] . "</td>";
                        echo "<td><a href='editar_feedback.php?id=" . $row['ID'] . "' class='btn'>Editar</a> ";
                        echo "<a href='apagar_feedback.php?id=" . $row['ID'] . "' class='btn btn-delete'>Apagar</a></td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhum feedback encontrado</td></tr>";
                }

                $conn->close();
                ?>
            </table>
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

    <script>
        function toggleAddFeedbackForm() {
            var form = document.getElementById('addFeedbackForm');
            form.style.display = 'block'; // Mostra o formulário
        }

        function cancelarAdicionar() {
            var form = document.getElementById('addFeedbackForm');
            form.style.display = 'none'; // Oculta o formulário
        }

        function enviarFeedback() {
            var nome = document.getElementById('nome').value;
            var empresa = document.getElementById('empresa').value;
            var ano_cliente = document.getElementById('ano_cliente').value;
            var opiniao = document.getElementById('opiniao').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'processar_adicionar_feedback.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status == 200) {
                    // Alerta de feedback adicionado
                    alert('Feedback adicionado com sucesso!');

                    // Atualizar a tabela de feedbacks (opcional)
                    var newRow = document.createElement('tr');
                    newRow.innerHTML = xhr.responseText;
                    document.querySelector('table tbody').appendChild(newRow);

                    // Limpar campos do formulário
                    document.getElementById('nome').value = '';
                    document.getElementById('empresa').value = '';
                    document.getElementById('ano_cliente').value = '';
                    document.getElementById('opiniao').value = '';

                    // Ocultar o formulário após enviar (opcional)
                    document.getElementById('addFeedbackForm').style.display = 'none';
                } else {
                    alert('Erro ao adicionar feedback. Tente novamente.');
                }
            };
            xhr.send('nome=' + nome + '&empresa=' + empresa + '&ano_cliente=' + ano_cliente + '&opiniao=' + opiniao);
        }

        function verificarAcessoAdministracao() {
            var senha = prompt('Por favor, digite a senha para acessar a administração:');
            if (senha === 'admiSIGV') {
                window.location.href = 'admin.php'; // Redireciona para a página de administração
            } else {
                alert('Senha incorreta. Acesso negado.');
            }
        }
    </script>
</body>

</html>
