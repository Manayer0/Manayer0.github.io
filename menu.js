// menu.js
function updateQuantity(elementId, change) {
    // ... (existing updateQuantity logic)
}

function addToCart(name, id) {
    var cartContainer = document.getElementById('cart-container');
    var cartSection = document.getElementById('cart-section');

    if (!cartSection) {
        var cartHtml = '<div id="cart-section" class="cart">' +
            '<h2>Shopping Cart</h2>' +
            '<ul id="cart-items" class="list-group"></ul>' +
            '<p>Total: BD<span id="cart-total">0.00</span></p>' +
            '<button id="checkoutButton" class="btn btn-primary" onclick="proceedToCheckout()">Proceed to Checkout</button>' +
            '</div>';
        cartContainer.innerHTML = cartHtml;
        cartSection = document.getElementById('cart-section');
    }

    // ... (rest of the addToCart logic, updating cart content)
}

function proceedToCheckout() {
    // ... (existing proceedToCheckout logic)
}

///
function updateQuantity(elementId, amount) {
    const quantityElement = document.getElementById(elementId);
    let quantity = parseInt(quantityElement.innerText) + amount;

    if (quantity < 0) {
        quantity = 0;
    }

    quantityElement.innerText = quantity;
}

function addToCart(name, id) {
    const sizeSelect = document.getElementById(`size-${id}`);
    const selectedSize = sizeSelect.options[sizeSelect.selectedIndex].value;
    const price = parseFloat(sizeSelect.dataset[selectedSize]);

    const quantity = parseInt(document.getElementById(`quantity-${id}`).innerText);

    const cartItems = document.getElementById('cart-items');
    const listItem = document.createElement('li');
    listItem.className = 'list-group-item cart-item';
    listItem.dataset.price = price;
    listItem.dataset.quantity = quantity;

    listItem.innerHTML = `
        ${name} - ${selectedSize} - $${price.toFixed(2)} x ${quantity}
        <button class="btn btn-danger btn-sm float-end" onclick="removeCartItem(this)">Remove</button>
    `;

    cartItems.appendChild(listItem);

    updateTotal();
}

function updateTotal() {
    let total = 0;
    const cartItems = document.querySelectorAll('.cart-item');

    cartItems.forEach(item => {
        const price = parseFloat(item.dataset.price);
        const quantity = parseInt(item.dataset.quantity);
        total += price * quantity;
    });

    document.getElementById('cart-total').innerText = total.toFixed(2);
}

function removeCartItem(button) {
    const listItem = button.parentElement;
    listItem.remove();
    updateTotal();
}
function proceedToCheckout() {
    window.location.href = '/paymentMethod.php';
}