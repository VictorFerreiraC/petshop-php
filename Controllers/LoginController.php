<?php
session_start();
require_once('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pegando as informações do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consultando o banco de dados para verificar o usuário
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Verificando se o usuário existe e se a senha está correta
    if ($user && md5($password) === $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Redirecionando para a página inicial após o login
        header("Location: ../pages/dashboard/index.php");
        exit();
    } else {
        // Exibindo um alerta via JavaScript
        echo "<script>alert('Usuário ou senha inválidos!'); window.location.href = '../pages/login/index.php';</script>";
    }
}
