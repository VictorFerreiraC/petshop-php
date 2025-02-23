<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: /petshop/pages/dashboard/");
    exit();
}
?>
<link rel="stylesheet" href="./styles.css">

<form action="../../controllers/LoginController.php" method="POST">
    <h1>Login</h1>
    <input type="text" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Senha">
    <button type="submit">Entrar</button>
</form>