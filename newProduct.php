<?php
$view = new stdClass();
$view->pageTitle = 'new juice';
require_once('Views/newProduct.phtml');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission
    $juiceName = $_POST['juiceName'];
    $desc = $_POST['desc'];
    $pic = $_POST['pic'];


    // Validate and sanitize the input (you can add more validation as needed)
    $juiceName = htmlspecialchars($juiceName);
    $desc = htmlspecialchars($des);
    $pic = htmlspecialchars($pic);

    // Construct the HTML code for the new juice item
    $newBlogHTML = "
    <div class='drink' data-id='1'>
    $pic
    <h2>$juiceName</h2>
    <p> $desc</p>
    <div class='size-container'>
        <label for='size-1'>Size:</label>
        <select id='size-1' class='size-dropdown' data-small='1.15' data-medium='1.25' data-large='1.45'>
            <option value='small'>Small</option>
            <option value='medium'>Medium</option>
            <option value='large'>Large</option>
        </select>
    </div>
    <div class='quantity-container'>
        <button class='quantity-btn' onclick='updateQuantity('quantity-1', -1)'>-</button>
        <span class='quantity' id='quantity-1'>1</span>
        <button class='quantity-btn' onclick='updateQuantity('quantity-1', 1)'>+</button>
    </div>
    <button class='btn btn-success add-to-cart' onclick='addToCart('Ahmed', 1)'>Add to Cart</button>
</div>
    ";

    // Specify the path to your menu.phtml file
    $blogFilePath = 'Views/menu.phtml';

    // Check if the file exists and is writable
    if (is_writable($blogFilePath)) {
        // Open the file in append mode
        if ($file = fopen($blogFilePath, 'a')) {
            // Write the new juice HTML code to the file
            fwrite($file, $newBlogHTML);

            // Close the file
            fclose($file);

            echo 'item has been successfully added.';
        } else {
            echo 'Error opening the menu file.';
        }
    } else {
        echo 'menu file is not writable or does not exist.';
    }
}
?>

