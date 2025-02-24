function formatDate(dateString) {
    const date = new Date(dateString);
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
}

function loadProducts() {
    fetch('../../Controllers/ProductController.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro na requisição');
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                alert(data.error);
                return;
            }

            const productTable = document.getElementById('product-table').getElementsByTagName('tbody')[0];
            productTable.innerHTML = '';

            data.forEach(product => {
                const row = document.createElement('tr');

                const preco = `R$ ${parseFloat(product.price).toFixed(2).replace('.', ',')}`;
                const validade = product.expiration_date ? formatDate(product.expiration_date) : 'N/A';

                row.innerHTML = `
                    <td>${product.id}</td>
                    <td>${product.name}</td>
                    <td>${product.description}</td>
                    <td>${preco}</td>
                    <td>${product.quantity}</td>
                    <td>${validade}</td>
                    <td>${product.category_name}</td>
                    <td>
                        <div class="product-actions">
                            <button class="add-product" onclick="editProduct(${product.id})" title="Editar Produto">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="remove-product" onclick="deleteProduct(${product.id})" title="Excluir Produto">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                `;

                productTable.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Erro ao carregar os produtos:', error);
        });
}

document.addEventListener('DOMContentLoaded', loadProducts);

function editProduct(productId) {
    alert(`Editar produto ID: ${productId}`);
}

function deleteProduct(productId) {
    if (confirm('Tem certeza que deseja excluir este produto?')) {
        alert(`Excluir produto ID: ${productId}`);
    }
}