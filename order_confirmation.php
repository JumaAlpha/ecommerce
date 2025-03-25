<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: shop.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch the most recent order for the user
$order_query = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY created_at DESC LIMIT 1";
$order_result = mysqli_query($conn, $order_query);
$order = mysqli_fetch_assoc($order_result);

if (!$order) {
    echo "No order found.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Order Confirmation</h1>
    <p>Thank you for your order!</p>
    <p>Your order details are as follows:</p>
    <p>Order ID: <?php echo htmlspecialchars($order['id']); ?></p>
    <p>Total Price: $<?php echo htmlspecialchars($order['total_price']); ?></p>
    <p>Shipping Address: <?php echo htmlspecialchars($order['shipping_address']); ?></p>
    <p>Status: <?php echo htmlspecialchars($order['status']); ?></p>

    <h3>Items in your Order:</h3>
    <ul>
        <?php
        // Fetch the items in the order
        $items_query = "SELECT * FROM orders WHERE user_id = '$user_id' AND created_at = '{$order['created_at']}'";
        $items_result = mysqli_query($conn, $items_query);
        while ($item = mysqli_fetch_assoc($items_result)) {
            echo "<li>{$item['product_name']} (x{$item['quantity']})</li>";
        }
        ?>
    </ul>
</body>
</html>

<?php
mysqli_close($conn);
?>
