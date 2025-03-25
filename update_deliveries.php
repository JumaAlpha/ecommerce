<?php
include 'config.php'; // Include your database connection

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get all order IDs
    $order_ids = array_keys($_POST['completed']);

    // Loop through all deliveries to update the database
    foreach ($order_ids as $order_id) {
        // If the checkbox is ticked, set is_completed to 1 and update delivery_status to 'Delivered'
        $is_completed = isset($_POST['completed'][$order_id]) && $_POST['completed'][$order_id] == '1' ? 1 : 0;

        if ($is_completed) {
            // If completed, update the delivery_status to 'Delivered'
            $updateQuery = "UPDATE deliveries SET is_completed = 1, delivery_status = 'Delivered' WHERE order_id = $order_id";
        } else {
            // If not completed, keep the original delivery_status and set is_completed to 0
            $updateQuery = "UPDATE deliveries SET is_completed = 0 WHERE order_id = $order_id";
        }

        // Execute the update query
        mysqli_query($conn, $updateQuery) or die(mysqli_error($conn));
    }

    // Redirect back to the admin page or show a success message
    header("Location: admin.php");
    exit();
}
?>
