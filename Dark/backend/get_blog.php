<?php
header('Content-Type: application/json');
require 'db_connection.php'; // Ensure database connection

$response = ["error" => "Unknown error occurred"];

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input

    try {
        // Fetch blog details
        $query = $conn->prepare("SELECT * FROM blogs WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $blog = $query->fetch(PDO::FETCH_ASSOC);

        if ($blog) {
            // Fetch images related to this blog from blog_image table
            $imgQuery = $conn->prepare("SELECT image_path FROM blog_image WHERE blog_id = :id");
            $imgQuery->bindParam(':id', $id, PDO::PARAM_INT);
            $imgQuery->execute();
            $images = $imgQuery->fetchAll(PDO::FETCH_COLUMN);

            // Add images to the blog response
            $blog['images'] = $images;
            $response = $blog;
        } else {
            $response = ["error" => "Blog not found"];
        }
    } catch (PDOException $e) {
        $response = ["error" => "Database error: " . $e->getMessage()];
    }
} else {
    $response = ["error" => "Invalid blog ID"];
}

// Debugging: Log response to check JSON format
file_put_contents('debug_log.txt', json_encode($response, JSON_PRETTY_PRINT));

echo json_encode($response);
?>
