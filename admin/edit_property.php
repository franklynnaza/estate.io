<?php
session_start();

require '../includes/db.php';

// Check if the user is authenticated
// checkAuth();

// Check if a property ID is passed in the URL
if (isset($_GET['id'])) {
    $property_id = $_GET['id'];

    // Fetch the current details of the property
    $sql = "SELECT * FROM properties WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $property_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $property = $result->fetch_assoc();
    } else {
        echo "Property not found.";
        exit;
    }
} else {
    echo "Property ID is missing.";
    exit;
}

// Handle the form submission when updating the property details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $rooms = $_POST['rooms'];
    $toilets = $_POST['toilets'];
    $category = $_POST['category'];  // New field for category

    // Update the property in the database
    $sql = "UPDATE properties SET title = ?, description = ?, price = ?, location = ?, rooms = ?, toilets = ?, category = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssdsdssi', $title, $description, $price, $location, $rooms, $toilets, $category, $property_id);
    
    if ($stmt->execute()) {
        echo "Property updated successfully.";
    } else {
        echo "Error updating property.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link rel="stylesheet" href="../assets/edit_property.css">
</head>
<body>
    <div class="container">
        <h1>Edit Property Details</h1>
        
        <form method="POST" action="edit_property.php?id=<?php echo $property['id']; ?>">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $property['title']; ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo $property['description']; ?></textarea>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo $property['price']; ?>" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?php echo $property['location']; ?>" required>

            <label for="rooms">Rooms:</label>
            <input type="number" id="rooms" name="rooms" value="<?php echo $property['rooms']; ?>" required>

            <label for="toilets">Toilets:</label>
            <input type="number" id="toilets" name="toilets" value="<?php echo $property['toilets']; ?>" required>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="sale" <?php echo ($property['category'] == 'sale') ? 'selected' : ''; ?>>Sale</option>
                <option value="rent" <?php echo ($property['category'] == 'rent') ? 'selected' : ''; ?>>Rent</option>
            </select>

            <button type="submit">Update Property</button>
            <a href="./dashboard.php" style="text-decoration: none;">Back to dashboard</a>
        </form>
    </div>
</body>
</html>
