<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/index.php"); // Redireciona para o login se não estiver logado
    exit();
}

include('../../includes/header.php');
?>
<link rel="stylesheet" href="./styles.css">

<h1> Lista de Produtos</h1>

<a href="../dashboard/">Dashboard</a>

<?php include('../../includes/footer.php'); ?>