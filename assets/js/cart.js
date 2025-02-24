function combineCartItems(cart) {
    const combinedCart = cart.reduce((acc, item) => {
        const existingItem = acc.find(i => i.id === item.id);
        if (existingItem) {
            existingItem.quantity += (item.quantity || 1);
        } else {
            acc.push({...item, quantity: item.quantity || 1});
        }
        return acc;
    }, []);
    return combinedCart;
}

function updateCart() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let combinedCart = combineCartItems(cart);
    let totalPrice = 0;
    let cartList = document.getElementById('cart-list');
    
    cartList.innerHTML = '';
    
    combinedCart.forEach((item, index) => {
        let listItem = document.createElement('li');
        listItem.className = 'cart-item';
        
        // Crear contenedor para el texto y el botón
        listItem.innerHTML = `
            <span>${item.name} - ${item.quantity} x ${item.price}€</span>
            <button class="delete-btn btn btn-danger grow" data-index="${index}">Eliminar uno</button>
        `;
        
        // Añadir evento al botón de eliminar
        listItem.querySelector('.delete-btn').addEventListener('click', () => removeItem(index));
        
        cartList.appendChild(listItem);
        totalPrice += item.price * item.quantity;
    });

    let totalItem = document.createElement('p');
    totalItem.className = 'cart-total';

    if (combinedCart.length != 0) {
        totalItem.textContent = `Total: ${totalPrice.toFixed(2)}€`; 
        cartList.appendChild(totalItem);
    }
    
    // Actualizar el localStorage con los items combinados
    localStorage.setItem('cart', JSON.stringify(combinedCart));
}

function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let combinedCart = combineCartItems(cart);
    let itemToUpdate = combinedCart[index];

    if (itemToUpdate.quantity > 1) {
        // Si hay más de una unidad, reducir la cantidad en 1
        itemToUpdate.quantity--;
        
        // Reconstruir el carrito con las cantidades actualizadas
        let updatedCart = [];
        for (let i = 0; i < itemToUpdate.quantity; i++) {
            updatedCart.push({
                id: itemToUpdate.id,
                name: itemToUpdate.name,
                price: itemToUpdate.price,
                quantity: 1
            });
        }
        
        // Mantener el resto de productos
        combinedCart.forEach((item, i) => {
            if (i !== index) {
                for (let j = 0; j < item.quantity; j++) {
                    updatedCart.push({
                        id: item.id,
                        name: item.name,
                        price: item.price,
                        quantity: 1
                    });
                }
            }
        });
        
        localStorage.setItem('cart', JSON.stringify(updatedCart));
    } else {
        // Si solo hay una unidad, eliminar el producto completamente
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
    }
    
    updateCart();
}

function emptyCart() {
    localStorage.removeItem('cart');
    updateCart();
}

function main() {
    updateCart();
}

main();