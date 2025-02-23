<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Usuário não logado']);
    exit();
}

require_once('../config/db.php');

$sql = "SELECT p.id, p.name, p.description, p.price, p.quantity, p.expiration_date, c.name AS category_name 
    FROM products p
    JOIN categories c ON p.category_id = c.id
    ORDER BY p.id";
$sql = $pdo->prepare($sql);
$sql->execute();
$products = $sql->fetchAll(PDO::FETCH_ASSOC);

// Retornar os produtos em formato JSON
echo json_encode($products);
