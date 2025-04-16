document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('product-form');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('product-name').value;
        const image = document.getElementById('product-image').value;
        const price = parseInt(document.getElementById('product-price').value);

        let products = JSON.parse(localStorage.getItem('products')) || [];
        products.push({ name, image, price });
        localStorage.setItem('products', JSON.stringify(products));

        alert('Đã thêm sản phẩm thành công!');
        form.reset();
    });
});
