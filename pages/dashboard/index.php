<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login");
    exit();
}

include('../../includes/header.php');
?>

<link rel="stylesheet" href="./styles.css">

<a href="../product_list/">Lista de produtos</a>

<main>
    <h1>Bem-vindo <?php echo $_SESSION['name']; ?>!</h1>
</main>

<?php include('../../includes/footer.php'); ?>