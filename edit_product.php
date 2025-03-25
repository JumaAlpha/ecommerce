<?php
include('config.php');
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $query = "UPDATE products SET name='$name', model='$model', price='$price', description='$description' WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        header('Location: admin.php');
    }
}

$productQuery = "SELECT * FROM products WHERE id='$id'";
$productResult = mysqli_fetch_assoc(mysqli_query($conn, $productQuery));
?>
<form method="POST">
    <input type="text" name="name" value="<?php echo $productResult['name']; ?>">
    <input type="text" name="model" value="<?php echo $productResult['model']; ?>">
    <input type="number" name="price" value="<?php echo $productResult['price']; ?>">
    <textarea name="description"><?php echo $productResult['description']; ?></textarea>
    <button type="submit">Update Product</button>
</form>
