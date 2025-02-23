<?php
session_start();
require_once('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pegando as informações do formulário
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consultando o banco de dados para verificar o usuário
    $sql = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $sql->execute([$email]);
    $user = $sql->fetch();

    // Verificando se o usuário existe e se a senha está correta
    if ($user && md5($password) === $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        // Redirecionando para a página inicial após o login
        header("Location: ../pages/dashboard");
        exit();
    } else {
        // Exibindo um alerta via JavaScript
        echo "<script>alert('Usuário ou senha inválidos!'); window.location.href = '../pages/login';</script>";
    }
}
