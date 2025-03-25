<?php
session_start();
include('config.php');

// Ensure the user is logged in as an admin
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

// Check if the form to add a new product was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    // Insert the new product into the products table
    $addProductQuery = "INSERT INTO products (name, model, price, description, image_url) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $addProductQuery);
    mysqli_stmt_bind_param($stmt, 'ssdss', $name, $model, $price, $description, $image_url);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Product added successfully!</p>";
    } else {
        echo "<p>Error adding product: " . mysqli_error($conn) . "</p>";
    }

    mysqli_stmt_close($stmt);
}

// Fetch existing products
$productQuery = "SELECT * FROM products";
$productResult = mysqli_query($conn, $productQuery);

// Fetch client orders
$orderQuery = "SELECT * FROM orders";
$orderResult = mysqli_query($conn, $orderQuery);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="dashboard-container">
        <h1>Admin Dashboard</h1>

        <!-- Product Management Section -->
        <div class="product-section">
            <h2>Manage Products</h2>

            <!-- Add Product Form -->
            <form method="POST" action="" class="product-form">
                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="model">Product Model:</label>
                    <input type="text" name="model" id="model" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" step="0.01" name="price" id="price" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image_url">Image URL:</label>
                    <input type="text" name="image_url" id="image_url">
                </div>
                <button type="submit" name="add_product" class="submit-btn">Add Product</button>
            </form>

            <!-- Product List Table -->
            <h2>Products List</h2>
            <table border="1" class="products-table">
                <tr>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($productResult)): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['model']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><img src="<?php echo $row['image_url']; ?>" alt="Product Image" width="50"></td>
                        <td>
                            <a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a> |
                            <a href="delete_product.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>

        <div class="orders-section">
            <h2>Client Orders</h2>
            <table border="1" class="orders-table">
                <tr>
                    <th>Order ID</th>
                    <th>Client Name</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Address</th>
                    <th>Date</th>
                </tr>
                <?php while ($order = mysqli_fetch_assoc($orderResult)): ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['username']; ?></td>
                        <td><?php echo $order['product_name']; ?></td>
                        <td><?php echo $order['quantity']; ?></td>
                        <td><?php echo $order['shipping_address']; ?></td>
                        <td><?php echo $order['created_at']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>


        <!-- Logout Button -->
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Show modal on button click
            $('.add-delivery-btn').on('click', function() {
                // Populate modal data using the clicked button's data attributes
                $('#modal-order-id').val($(this).data('order-id'));
                $('#client_name').val($(this).data('client-name'));

                // Show the modal
                $('#delivery-modal').css('display', 'block');
            });

            // Close modal on close button click
            $('.close').on('click', function() {
                $('#delivery-modal').css('display', 'none');
            });

            // Close modal if user clicks outside of the modal
            $(window).on('click', function(event) {
                if ($(event.target).is('#delivery-modal')) {
                    $('#delivery-modal').css('display', 'none');
                }
            });
        });
    </script>

</body>

</html>

<?php
mysqli_close($conn);
?>