<?php
session_start();

require '../includes/db.php';

// checkAuth();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_property'])) {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $rooms = $_POST['rooms'];
    $toilets = $_POST['toilets'];
    $category = $_POST['category']; // New category field

    // Insert property details
    $sql = "INSERT INTO properties (title, description, price, location, rooms, toilets, category) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssiss', $title, $description, $price, $location, $rooms, $toilets, $category);

    if ($stmt->execute()) {
        $property_id = $stmt->insert_id;

        // Handle image uploads
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $image_name = basename($_FILES['images']['name'][$key]);
            $target_file = '../uploads/' . $image_name;

            if (move_uploaded_file($tmp_name, $target_file)) {
                $image_sql = "INSERT INTO images (property_id, image_path) VALUES (?, ?)";
                $image_stmt = $conn->prepare($image_sql);
                $image_stmt->bind_param('is', $property_id, $target_file);
                $image_stmt->execute();
            }
        }

        echo "Property added successfully.";
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>
    <link rel="stylesheet" href="../assets/add_property.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Add New Property</h1>
        <form method="POST" action="add_property.php" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Property Title" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="number" name="price" placeholder="Price" required>
    <input type="text" name="location" placeholder="Location" required>
    <input type="number" name="rooms" placeholder="Number of Rooms" required>
    <input type="number" name="toilets" placeholder="Number of Toilets" required>

    <label for="category">Category:</label>
    <select name="category" id="category" required>
        <option value="sale">Sale</option>
        <option value="rent">Rent</option>
    </select>

    <label for="images">Property Images (multiple allowed):</label>
    <input type="file" name="images[]" id="images" multiple required>
    <button type="submit" name="add_property">Add Property</button>
</form>


    </div>
</body>
</html>
