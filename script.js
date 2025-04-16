document.addEventListener("DOMContentLoaded", function () {
    const cartIcon = document.querySelector(".cart-icon");
    const addToCartButtons = document.querySelectorAll(".add-to-cart");
  
    // Xử lý khi nhấn nút Thêm vào giỏ
    addToCartButtons.forEach((btn) => {
      btn.addEventListener("click", function (e) {
        e.preventDefault();
  
        const product = btn.closest(".product-item");
        const productName = product.querySelector(".product-name").innerText;
        const productPrice = product.querySelector(".price").innerText;
  
        const existingCart = JSON.parse(localStorage.getItem("cart")) || [];
        existingCart.push({ name: productName, price: productPrice });
        localStorage.setItem("cart", JSON.stringify(existingCart));
  
        // Hiệu ứng rung icon giỏ
        cartIcon.classList.add("shake");
        setTimeout(() => cartIcon.classList.remove("shake"), 500);
  
        alert(`${productName} đã được thêm vào giỏ hàng!`);
      });
    });
  
    // Khi nhấn icon giỏ hàng, chuyển sang trang cart
    cartIcon.addEventListener("click", () => {
      window.location.href = "cart.html";
    });
  });

  const cartIcon = document.querySelector(".cart-icon");

cartIcon.addEventListener("click", () => {
  window.location.href = "cart.html";
});