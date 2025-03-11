<?php
session_start();

require '../includes/db.php';

// checkAuth();

if (isset($_GET['id'])) {
    $property_id = $_GET['id'];

    // Fetch images for the property
    $sql = "SELECT * FROM images WHERE property_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $property_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Images</title>
    <link rel="stylesheet" href="../assets/images.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Property Images</h1>
        <a href="dashboard.php">Back to Dashboard</a>
        <div class="images-gallery">
            <?php while ($image = $result->fetch_assoc()): ?>
                <div class="image-item">
                    <img src="<?= $image['image_path'] ?>" alt="Property Image" style="width:200px;">
                    <a href="delete_image.php?id=<?= $image['id'] ?>&property_id=<?= $property_id ?>" class="delete">Delete</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
