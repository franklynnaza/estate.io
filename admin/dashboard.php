<?php
// Start the session and include necessary files
session_start();

require '../includes/db.php';   // Database connection

// Fetch properties from the database, including the category
$sql = "SELECT * FROM properties ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Admin Dashboard</h1>
            <a href="add_property.php">Add New Property</a>
        </div>

        <table>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Location</th>
                <th>Rooms</th>
                <th>Toilets</th>
                <th>Category</th> <!-- New column for category -->
                <th>Actions</th>
            </tr>

            <?php if ($result->num_rows > 0): ?>
                <?php while ($property = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($property['title']) ?></td>
                        <td>₦<?= number_format($property['price'], 2) ?></td>
                        <td><?= htmlspecialchars($property['location']) ?></td>
                        <td><?= $property['rooms'] ?></td>
                        <td><?= $property['toilets'] ?></td>
                        <td><?= ucfirst($property['category']) ?></td> <!-- Display category -->
                        <td class="actions">
                            <a href="edit_property.php?id=<?= $property['id'] ?>" class="edit">Edit</a>
                            <a href="delete_property.php?id=<?= $property['id'] ?>" class="delete">Delete</a>
                            <a href="images.php?id=<?= $property['id'] ?>" class="images">Images</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No properties found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
