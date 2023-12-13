function addToCart(drinkName) {

    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    cartItems.push(drinkName);
    localStorage.setItem('cartItems', JSON.stringify(cartItems));

 
    window.location.href = '../Views/cart.phtml';
}