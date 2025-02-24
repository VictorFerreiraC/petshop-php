<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/index.php");
    exit();
}

include('../../includes/header.php');
?>
<link rel="stylesheet" href="./styles.css">

<a href="../dashboard/">Dashboard</a>

<main>
    <h1> Lista de Produtos</h1>

    <table id="product-table">
        <thead>
            <tr>
                <th class="product-id">ID</th>
                <th class="product-name">Nome</th>
                <th class="product-description">Descrição</th>
                <th class="product-price">Preço</th>
                <th class="product-quantity">Quantidade</th>
                <th class="product-expiration">Validade</th>
                <th class="product-category">Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

</main>

<script src="./script.js"></script>

<?php include('../../includes/footer.php'); ?>