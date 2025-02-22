// Implementar lógica para añadir productos al carrito

document.addEventListener("DOMContentLoaded", function () {
    const addToCartBtn = document.getElementById("product-to-cart");
    if (addToCartBtn) {
        const productId = addToCartBtn.getAttribute("data-id");
        const productInfo = document.querySelector(".product-info");
        const productDetails = document.querySelector(".product-container");
        const productPriceElement = productInfo.querySelector("h3[data-price]");
        const productPrice = productPriceElement.getAttribute("data-price");
        const productName = productDetails.querySelector("h1[data-name]").textContent.trim();;
    
        const formattedPrice = productPrice.replace("€", "").replace(",", ".");
      
        addToCartBtn.addEventListener("click", function () {
            const cart = JSON.parse(localStorage.getItem("cart")) || [];
            const product = {
            id: productId,
            name: productName,
            price: parseFloat(formattedPrice)
            };
            cart.push(product);
            localStorage.setItem("cart", JSON.stringify(cart));
            alert("Product added to cart!");
        });
  }
});