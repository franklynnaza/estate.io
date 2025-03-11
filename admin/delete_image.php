<?php
session_start();

require '../includes/db.php';

// checkAuth();

if (isset($_GET['id']) && isset($_GET['property_id'])) {
    $image_id = $_GET['id'];
    $property_id = $_GET['property_id'];

    // Get image path
    $sql = "SELECT image_path FROM images WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $image_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $image = $result->fetch_assoc();

    if (file_exists($image['image_path'])) {
        unlink($image['image_path']); // Delete file
    }

    // Delete image from database
    $delete_sql = "DELETE FROM images WHERE id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param('i', $image_id);

    if ($delete_stmt->execute()) {
        echo "Image deleted successfully.";
        header("Location: images.php?id=$property_id");
        exit;
    } else {
        echo "Error: " . $delete_stmt->error;
    }
}
?>
