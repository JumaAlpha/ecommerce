<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php");
    exit();
}

include 'config.php';

$user_id = $_SESSION['user_id'];

// Fetch user data
$user_query = "SELECT username FROM users WHERE id = '$user_id'";
$user_result = mysqli_query($conn, $user_query);
$user = mysqli_fetch_assoc($user_result);

// Fetch the products available in the shop
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

// Fetch the user's cart items from the `cart` table
$cart_query = "SELECT cart.id, cart.quantity, products.name, products.price FROM cart 
               JOIN products ON cart.product_id = products.id 
               WHERE cart.user_id = '$user_id'";
$cart_result = mysqli_query($conn, $cart_query);
$cart_items = mysqli_fetch_all($cart_result, MYSQLI_ASSOC);

// Check for any previous orders
$order_query = "SELECT * FROM orders WHERE user_id = '$user_id'";
$order_result = mysqli_query($conn, $order_query);
$orders = mysqli_fetch_all($order_result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <style>
        /* Add your styling here */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Header */
        header {
            background-color: #333;
            color: white;
            padding: 15px 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header .logo {
            font-size: 1.5em;
            font-weight: bold;
        }

        header nav ul {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        /* User and Logout */
        .user-details {
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: bold;
        }

        .logout-btn {
            background: #f39c12;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Cart Icon */
        .cart-icon {
            position: fixed;
            top: 20px;
            right: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: #f39c12;
            border-radius: 50%;
            color: white;
            font-size: 24px;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 2px 8px;
            font-size: 14px;
        }

        /* Main Content */
        .container {
            padding: 0 5%;
            margin-top: 80px;
        }

        .welcome-message {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Order and Product Section */
        .order-info,
        .product-list {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .order-info ul,
        .product-list {
            list-style: none;
            padding: 0;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-around;
        }

        .product-item {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            width: calc(30% - 20px);
            text-align: center;
        }

        .product-item button {
            background: #f39c12;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Footer */
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">IT_SOLUTIONS</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
        <div class="user-details">
            <span>Welcome, <?php echo htmlspecialchars($user['username']); ?></span>
            <form action="logout.php" method="POST" style="display:inline;">
                <button class="logout-btn" type="submit">Logout</button>
            </form>
        </div>
    </header>

    <div class="container">
        <h1 class="welcome-message">Welcome, <?php echo htmlspecialchars($user['username']); ?></h1>

        <h2>Your Previous Orders:</h2>
        <div class="order-info">
            <?php if (count($orders) > 0): ?>
                <ul>
                    <?php foreach ($orders as $order): ?>
                        <li><?php echo htmlspecialchars($order['product_name']); ?> (x<?php echo $order['quantity']; ?>) -
                            Address: <?php echo htmlspecialchars($order['shipping_address']); ?> - Status:
                            <?php echo htmlspecialchars($order['status']); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No previous orders found.</p>
            <?php endif; ?>
        </div>

        <h2>Products</h2>
        <div class="product-list" id="product-list">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="product-item">
                    <div class="product-image">
                        <img src=<?php echo htmlspecialchars($row['image_url']);?>>
                    </div>
                    <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                    <p>Price: $<?php echo htmlspecialchars($row['price']); ?></p>
                    <button
                        onclick="addToCart(<?php echo $row['id']; ?>, '<?php echo addslashes($row['name']); ?>', <?php echo $row['price']; ?>)">Add
                        to Cart</button>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Display Cart Items -->

    </div>

    <!-- Cart Icon -->
    <div class="cart-icon" id="cart-icon" onclick="toggleCart()">
        🛒<span class="cart-count" id="cart-count"><?php echo count($cart_items); ?></span>
    </div>

    <div id="cart"
        style="display:none; position:fixed; right:20px; top:80px; width:250px; background:#fff; padding:20px; border:1px solid #ccc; border-radius:8px;">
        <h2>Your Cart</h2>
        <div id="cart-items">
            <?php if (count($cart_items) > 0): ?>
                <ul>
                    <?php foreach ($cart_items as $item): ?>
                        <li>
                            <?php echo htmlspecialchars($item['name']); ?> (x<?php echo $item['quantity']; ?>) -
                            $<?php echo $item['price'] * $item['quantity']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </div>
        <p>Total: <span id="total-price">0</span></p>
        <button onclick="checkout()">Checkout</button>
    </div>

    <script>
        let cart = <?php echo json_encode($cart_items); ?>;
        let cartCount = cart.length;
        let cartTotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

        document.getElementById('cart-count').innerText = cartCount;
        document.getElementById('total-price').innerText = cartTotal.toFixed(2);

        function toggleCart() {
            const cartElement = document.getElementById('cart');
            cartElement.style.display = cartElement.style.display === 'none' ? 'block' : 'none';
        }

        function addToCart(productId, productName, productPrice) {
            // Add to cart using AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'add_to_cart.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status == 200) {
                    alert('Item added to cart!');
                    location.reload(); // Reload page to update cart
                }
            };
            xhr.send('product_id=' + productId + '&product_name=' + productName + '&product_price=' + productPrice);
        }

        function checkout() {
            if (cart.length === 0) {
                alert("Your cart is empty.");
                return;
            }

            // Prompt the user for the shipping address
            let shippingAddress = prompt("Please enter your shipping address:");

            if (!shippingAddress) {
                alert("Shipping address is required.");
                return;
            }

            // Send the checkout request to the server using AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'checkout.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Redirect to order confirmation or show success message
                    window.location.href = "order_confirmation.php";
                } else {
                    alert('There was an error with the checkout. Please try again.');
                }
            };

            const data = `shipping_address=${encodeURIComponent(shippingAddress)}`;
            xhr.send(data);
        }
    </script>

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 IT Solutions. All rights reserved.</p>
            <p>Solutions For all</p>
        </div>
    </footer>
</body>

</html>

<?php
mysqli_close($conn);
?>