<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/index.php"); // Redireciona para o login se não estiver logado
    exit();
}

include('../../includes/header.php');
?>

<h1>Bem-vindo ao painel, <?php echo $_SESSION['username']; ?>!</h1>

<?php include('../../includes/footer.php'); ?>