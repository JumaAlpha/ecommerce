<?php
// Include database connection
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch form data
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
    $client_name = mysqli_real_escape_string($conn, $_POST['client_name']);
    $vehicle_license_plate = mysqli_real_escape_string($conn, $_POST['vehicle']);
    $driver_id = mysqli_real_escape_string($conn, $_POST['driver']);
    $expected_date = mysqli_real_escape_string($conn, $_POST['expected_delivery_date']);

    // Get the vehicle ID based on the license plate
    $vehicleQuery = "SELECT vehicle_id FROM vehicles WHERE license_plate = '$vehicle_license_plate'";
    $vehicleResult = mysqli_query($conn, $vehicleQuery);

    if (mysqli_num_rows($vehicleResult) > 0) {
        $vehicle = mysqli_fetch_assoc($vehicleResult);
        $vehicle_id = $vehicle['vehicle_id'];

        // Insert delivery assignment into the 'deliveries' table
        $insertQuery = "INSERT INTO deliveries (order_id, client_name, license_plate, driver_id, delivery_status, expected_delivery_date)
                        VALUES ('$order_id', '$client_name', '$vehicle_license_plate', '$driver_id', 'Pending', '$expected_date')";

        if (mysqli_query($conn, $insertQuery)) {
            // Redirect with success message (you can change this based on your UI)
            header('Location: admin.php');
            exit();
        } else {
            echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
        }
    } else {
        // Redirect with an error if the vehicle was not found
        header('Location: deliveries.php?error=Vehicle not found');
        exit();
    }
} else {
    // Redirect to the form if accessed directly
    header('Location: deliveries.php');
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
