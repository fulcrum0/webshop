function deleteProduct(productId) {
    const form = document.getElementById('delete-product-' + productId);
    if (form) {
        form.submit();
    }
}