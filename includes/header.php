<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    // pesquisar se realmente é necessario isso aqui
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/petshop/assets/img/petshop-icon.png" type="image/x-icon">
    <title>Pet Shop</title>
    <link rel="stylesheet" href="/petshop/includes/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <header>
        <a href="/petshop/logout.php" class="logout-btn">Sair</a>
    </header>