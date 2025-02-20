function updateCart(){

    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let totalPrice = 0;
    let cartList = document.getElementById('cart-list');
    
    cartList.innerHTML = '';
    
    cart.forEach(item => {
        let listItem = document.createElement('li');
        listItem.textContent = `${item.name} - ${item.quantity} x $${item.price}`;
        cartList.appendChild(listItem);
        totalPrice += item.quantity * item.price;
    });

    let totalItem = document.createElement('li');
    totalItem.textContent = `Total: $${totalPrice.toFixed(2)}`;
    cartList.appendChild(totalItem);
}

function emptyCart(){
    localStorage.removeItem('cart');
}


function main(){
 updateCart();
}
main();