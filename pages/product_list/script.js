function editProduct(id) {
    alert(`Editar produto ID: ${id}`);
}

function deleteProduct(id) {
    if (confirm('Tem certeza que deseja excluir este produto?')) {
        alert(`Excluir produto ID: ${id}`);
    }
}