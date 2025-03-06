function combineCartItems(cart) {
    return cart.reduce((acc, item) => {
        const existingItem = acc.find(i => i.id === item.id)
        if (existingItem) {
            existingItem.quantity += (item.quantity || 1)
        } else {
            acc.push({...item, quantity: item.quantity || 1})
        }
        return acc
    }, [])
}

function updateCart() {
    const cart = JSON.parse(localStorage.getItem("cart")) || []
    let combinedCart = combineCartItems(cart)
    let totalPrice = 0
    const cartList = document.getElementById("cart-list")
    cartList.innerHTML = ""

    if (combinedCart.length === 0) {
        let emptyMessage = document.createElement("p")
        emptyMessage.className = "cart-empty-message"
        emptyMessage.textContent = "No hay productos en el carrito"
        cartList.appendChild(emptyMessage)
    } else {
        combinedCart.forEach((item, index) => {
            let listItem = document.createElement("li")
            listItem.className = "cart-item"
            listItem.innerHTML = `
                <span>${item.name} - ${item.quantity} x ${item.price}€</span>
                <button class="delete-btn btn btn-danger grow" data-index="${index}">Eliminar uno</button>
            `
            listItem.querySelector(".delete-btn").addEventListener("click", () => removeItem(index))
            cartList.appendChild(listItem)
            totalPrice += item.price * item.quantity
        })

        let totalItem = document.createElement("p")
        totalItem.className = "cart-total"
        totalItem.textContent = `Total: ${totalPrice.toFixed(2)}€`
        cartList.appendChild(totalItem)
    }
    localStorage.setItem("cart", JSON.stringify(combinedCart))
}

function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || []
    let combinedCart = combineCartItems(cart)
    let itemToUpdate = combinedCart[index]

    if (itemToUpdate.quantity > 1) {
        itemToUpdate.quantity--
        let updatedCart = []
        combinedCart.forEach(item => {
            for (let i = 0; i < item.quantity; i++) {
                updatedCart.push({id: item.id, name: item.name, price: item.price, quantity: 1})
            }
        })
        localStorage.setItem("cart", JSON.stringify(updatedCart))
    } else {
        cart.splice(index, 1)
        localStorage.setItem("cart", JSON.stringify(cart))
    }
    updateCart()
}

function emptyCart() {
    localStorage.removeItem("cart")
    updateCart()
}

function createOrder() {
    let cart = JSON.parse(localStorage.getItem("cart")) || []

    if (cart.length === 0) {
        alert("No hay productos en el carrito.")
        return
    }

    fetch("/order/create", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({cart}),
    })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert("Hubo un problema con tu pedido: " + data.error)
                return
            }

            alert("¡Pedido realizado con éxito!")
            localStorage.removeItem("cart")

            updateCart()
            window.location.href = "/orders"
        })
        .catch((error) => {
            console.error("Error al realizar el pedido.", error)
            alert("Hubo un problema con tu pedido.")
        })
}

function main() {
    updateCart()
    document.querySelector(".create-order").addEventListener("click", createOrder)
}

main()