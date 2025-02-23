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
    <title>Pet Shop</title>
    <link rel="stylesheet" href="/petshop/includes/styles.css">
</head>

<body>
    <header>
        <a href="/petshop/logout.php" class="logout-btn">Sair</a>
    </header>