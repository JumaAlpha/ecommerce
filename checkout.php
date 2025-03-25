<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch the user's username
$user_query = "SELECT username FROM users WHERE id = '$user_id'";
$user_result = mysqli_query($conn, $user_query);
$user = mysqli_fetch_assoc($user_result);

if (!$user) {
    echo "User not found.";
    exit();
}

$username = $user['username'];

// Fetch the cart items for the user
$cart_query = "SELECT cart.id, cart.quantity, products.name, products.price FROM cart 
               JOIN products ON cart.product_id = products.id 
               WHERE cart.user_id = '$user_id'";
$cart_result = mysqli_query($conn, $cart_query);
$cart_items = mysqli_fetch_all($cart_result, MYSQLI_ASSOC);

if (empty($cart_items)) {
    echo "Your cart is empty.";
    exit();
}

// Assuming shipping address is posted from the checkout form
$shipping_address = $_POST['shipping_address'] ?? '';

// If no shipping address is provided, return an error
if (empty($shipping_address)) {
    echo "Shipping address is required.";
    exit();
}

// Calculate total price of the cart
$total_price = 0;
foreach ($cart_items as $item) {
    $total_price += $item['price'] * $item['quantity'];
}

// Insert the order into the `orders` table
foreach ($cart_items as $item) {
    $product_name = $item['name'];
    $quantity = $item['quantity'];
    $price = $item['price'];

    $order_query = "INSERT INTO orders (user_id, username, product_name, quantity, total_price, shipping_address, status)
                    VALUES ('$user_id', '$username', '$product_name', '$quantity', '$total_price', '$shipping_address', 'Pending')";
    mysqli_query($conn, $order_query);
}

// Clear the cart after placing the order
$clear_cart_query = "DELETE FROM cart WHERE user_id = '$user_id'";
mysqli_query($conn, $clear_cart_query);

// Redirect to the order confirmation page
header("Location: order_confirmation.php");
exit();
?>
