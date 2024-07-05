<!-- logout.php -->

<?php
session_start();

// Destroi a sessão de admin
session_destroy();

// Redireciona para a página de login
header('Location: login.php');
exit;
?>
