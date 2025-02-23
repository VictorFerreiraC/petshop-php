function formatDate(dateString) {
    const date = new Date(dateString);
    const day = String(date.getDate()).padStart(2, '0'); // Garantir 2 dígitos para o dia
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Garantir 2 dígitos para o mês
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
                `;

                productTable.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Erro ao carregar os produtos:', error);
        });
}
document.addEventListener('DOMContentLoaded', loadProducts);