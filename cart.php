<?php
session_start();
include('config.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT cart.*, products.name, products.price FROM cart JOIN products ON cart.product_id = products.id WHERE cart.user_id = '$user_id'";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="shop.css">
</head>

<body>

    <header>
        <div class="logo">IT_SOLUTIONS SHOP</div>
        <nav>
            <ul>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section class="cart">
        <h2>Your Cart</h2>
        <div class="cart-container">
            <?php
            $total = 0;

            if (mysqli_num_rows($result) > 0) {
                echo '<table>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    $total += $row['price'] * $row['quantity'];
                    echo '
                        <tr>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['quantity'] . '</td>
                            <td>$' . ($row['price'] * $row['quantity']) . '</td>
                        </tr>';
                }
                echo '</table>';
                echo '<h3>Total: $' . $total . '</h3>';
                echo '<a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>';
            } else {
                echo '<p>Your cart is empty.</p>';
            }
            ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 IT Solutions. All rights reserved.</p>
    </footer>

</body>

</html>
