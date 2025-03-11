<?php
session_start();

require '../includes/db.php';

// checkAuth();

if (isset($_GET['id'])) {
    $property_id = $_GET['id'];

    // Delete associated images
    $image_sql = "SELECT image_path FROM images WHERE property_id = ?";
    $image_stmt = $conn->prepare($image_sql);
    $image_stmt->bind_param('i', $property_id);
    $image_stmt->execute();
    $image_result = $image_stmt->get_result();

    while ($image = $image_result->fetch_assoc()) {
        if (file_exists($image['image_path'])) {
            unlink($image['image_path']); // Delete the file
        }
    }

    // Delete images from database
    $delete_images_sql = "DELETE FROM images WHERE property_id = ?";
    $delete_images_stmt = $conn->prepare($delete_images_sql);
    $delete_images_stmt->bind_param('i', $property_id);
    $delete_images_stmt->execute();

    // Delete property
    $delete_property_sql = "DELETE FROM properties WHERE id = ?";
    $delete_property_stmt = $conn->prepare($delete_property_sql);
    $delete_property_stmt->bind_param('i', $property_id);

    if ($delete_property_stmt->execute()) {
        echo "Property deleted successfully.";
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . $delete_property_stmt->error;
    }
}
?>
