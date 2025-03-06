document.addEventListener("DOMContentLoaded", function () {
    const addToCartBtn = document.getElementById("product-to-cart")
    if (addToCartBtn) {
        const productId = addToCartBtn.getAttribute("data-id")
        const productInfo = document.querySelector(".product-info")
        const productDetails = document.querySelector(".product-container")
        const productPriceElement = productInfo.querySelector("h3[data-price]")
        const productPrice = productPriceElement.getAttribute("data-price")
        const productName = productDetails.querySelector("h1[data-name]").textContent.trim()

        const formattedPrice = productPrice.replace("€", "").replace(",", ".")

        addToCartBtn.addEventListener("click", function () {
            let cart = JSON.parse(localStorage.getItem("cart")) || []

            let existingItem = cart.find(item => item.id === productId)
            if (existingItem) {
                existingItem.quantity++
            } else {
                cart.push({
                    id: productId,
                    name: productName,
                    price: parseFloat(formattedPrice),
                    quantity: 1
                })
            }

            localStorage.setItem("cart", JSON.stringify(cart))

            addToCartBtn.textContent = "¡Añadido!"
            addToCartBtn.classList.add("added")

            setTimeout(() => {
                addToCartBtn.textContent = "Añadir al Carrito"
                addToCartBtn.classList.remove("added")
            }, 1000)
        })
    }
})
