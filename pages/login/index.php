<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: /petshop/pages/dashboard/");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/petshop/assets/img/petshop-icon.png" type="image/x-icon">
    <title>Pet Shop</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>

    <div class="div-form">
        <form action="../../controllers/LoginController.php" method="POST">
            <h1>Login</h1>
            <input type="text" name="email" placeholder="E-mail">
            <input type="password" name="password" placeholder="Senha">
            <button type="submit">Entrar</button>
        </form>
    </div>

</body>

</html>