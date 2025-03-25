<?php
session_start();
include 'config.php';

if (isset($_SESSION['user_id']) && isset($_POST['product_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Check if the item already exists in the cart
    $check_cart_query = "SELECT * FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
    $check_result = mysqli_query($conn, $check_cart_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Item already in cart, update the quantity
        $update_query = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = '$user_id' AND product_id = '$product_id'";
        mysqli_query($conn, $update_query);
    } else {
        // Item not in cart, add it
        $insert_query = "INSERT INTO cart (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', 1)";
        mysqli_query($conn, $insert_query);
    }
}

mysqli_close($conn);
