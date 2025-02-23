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

<h1>Bem-vindo <?php echo $_SESSION['name']; ?>!</h1>

<a href="../product_list/">Lista de produtos</a>

<?php include('../../includes/footer.php'); ?>