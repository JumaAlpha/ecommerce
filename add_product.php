<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $query = "INSERT INTO products (name, model, price, description) VALUES ('$name', '$model', '$price', '$description')";
    if (mysqli_query($conn, $query)) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    header('Location: admin.php');
}
?>
