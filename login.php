<!-- login.php -->

<?php
session_start();

// Verifica se já está logado, redireciona para a página de admin se estiver
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    header('Location: admin.php');
    exit;
}

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];

    // Verifica se a senha está correta
    if ($password === 'admiSIGV') {
        // Autenticação bem-sucedida, define a sessão de admin
        $_SESSION['admin'] = true;
        header('Location: admin.php');
        exit;
    } else {
        // Senha incorreta, exibe uma mensagem de erro
        $erro = true;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Página de Administração</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
   
    <header> <!-- Início da seção de cabeçalho -->
        <div class="container"> <!-- Define um contêiner para o cabeçalho -->
            <h1 id="logo">SIGV</h1> <!-- Título do logo da empresa -->
            <div id="menu-toggle">&#9776;</div> <!-- Botão para abrir o menu -->
            <nav id="menu"> <!-- Navegação do menu -->
                <ul> <!-- Lista de itens do menu -->
                <li><a href="index.html">Inicio</a></li> <!-- Link para a página inicial -->
                    <li><a href="sobre.html">Sobre nós</a></li> <!-- Link para a página "Sobre nós" -->
                    <li><a href="informacao.html">Informações</a></li> <!-- Link para a página de informações -->
                    <li><a href="contactar.html">Contactar nos</a></li> <!-- Link para a página de contato -->
                    <li><a href="galeria.html">Galeria</a></li> <!-- Link para a página de galeria -->
                    <li><a href="feedback.php">FeedBack de clientes</a></li> <!-- Link para a página de feedback -->
                    <li><a href="parcerias.html">Parcerias</a></li> <!-- Link para a página de parcerias -->
                    <li><a href="login.php" >Administração</a></li>
                </ul>
            </nav>
        </div>
    </header> <!-- Fim da seção de cabeçalho -->
    <header>
        <h1>Login - Página de Administração</h1>
    </header>

    <section class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="password">Digite a Senha:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($erro) && $erro === true): ?>
            <p>Senha incorreta. Tente novamente.</p>
        <?php endif; ?>
    </section>

    <footer> <!-- Início da seção de rodapé -->
        <div class="footer-section-left"> <!-- Seção do rodapé à esquerda -->
            <p>Este não é o site oficial da SIGV</p> <!-- Texto informativo -->
        </div>
        <div class="footer-section-center"> <!-- Seção do rodapé central -->
            <img src="https://sigv.pt/wp-content/uploads/2020/09/logo_20191204_070818.png" alt="Logo SIGV"> <!-- Imagem do logo da SIGV -->
        </div>
        <div class="footer-section-right"> <!-- Seção do rodapé à direita -->
            <p>Para acesso ao site oficial clique aqui: <a href="https://sigv.pt">SIGV</a></p> <!-- Link para o site oficial da SIGV -->
            <p>Outros acessos: <a href="https://sigv.pt/contatos/">Contato</a> | <a href="https://sigv.pt/gal/">Sobre Nós</a> | <a href="https://sigv.pt/politica-de-privacidade/">Política de Privacidade</a></p> <!-- Links adicionais -->
            <p>&copy; 2024 Tecnologias. Todos os direitos reservados.</p> <!-- Direitos autorais -->
        </div>
    </footer> <!-- Fim da seção de rodapé -->
</body>
</html>
