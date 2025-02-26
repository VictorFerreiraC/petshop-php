<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login");
    exit();
}

require_once('../../Controllers/ProductController.php');
$products = getProducts();

include('../../includes/header.php');
?>
<link rel="stylesheet" href="./styles.css">

<a href="../dashboard/">Dashboard</a>

<main>
    <h1> Lista de Produtos</h1>

    <div class="table-container">
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
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td class="product-id"><?= $product['id'] ?></td>
                        <td class="product-name"><?= $product['name'] ?></td>
                        <td class="product-description"><?= $product['description'] ?></td>
                        <td class="product-price">R$ <?= number_format($product['price'], 2, ',', '.') ?></td>
                        <td class="product-quantity"><?= $product['quantity'] ?></td>
                        <td class="product-expiration">
                            <?= !empty($product['expiration_date']) ? date('d/m/Y', strtotime($product['expiration_date'])) : 'N/A' ?>
                        </td>
                        <td class="product-category"><?= $product['category_name'] ?></td>
                        <td>
                            <div class="product-actions">
                                <!-- Botão de edição -->
                                <button class="edit-product" onclick="editProduct(<?= $product['id'] ?>)" title="Editar Produto">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <!-- Botão de exclusão -->
                                <button class="remove-product" onclick="deleteProduct(<?= $product['id'] ?>)" title="Excluir Produto"
                                    onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<script src="script.js"></script>

<?php include('../../includes/footer.php'); ?>