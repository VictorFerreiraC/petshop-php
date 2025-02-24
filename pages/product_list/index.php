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
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Validade</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

</main>

<script src="./script.js"></script>

<?php include('../../includes/footer.php'); ?>