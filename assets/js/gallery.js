document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.id;
            const productName = this.dataset.name;
            const productPrice = parseFloat(this.dataset.price);
            
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            cart.push({
                id: productId,
                name: productName,
                price: productPrice,
                quantity: 1
            });
            
            localStorage.setItem('cart', JSON.stringify(cart));
            
            // Feedback visual
            this.textContent = '¡Añadido!';
            setTimeout(() => {
                this.textContent = 'Añadir al Carrito';
            }, 1000);
        });
    });
});