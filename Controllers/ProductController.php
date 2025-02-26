<?php
require_once __DIR__ . '/../config/db.php';

function getProducts()
{
    global $pdo;

    $sql = "SELECT p.id, p.name, p.description, p.price, p.quantity, p.expiration_date, c.name AS category_name 
            FROM products p
            INNER JOIN categories c ON p.category_id = c.id
            ORDER BY p.id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}