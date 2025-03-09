<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input data
    $name = $_POST['name'] ?? null;
    $duration = $_POST['duration'] ?? null;
    $overview = $_POST['overview'] ?? null;
    $published_date = $_POST['published_date'] ?? null;
    $author = $_POST['author'] ?? null;
    $description = $_POST['description'] ?? null;

    if (!$name || !$duration || !$overview || !$published_date || !$author || !$description) {
        echo "All fields are required.";
        exit;
    }

    try {
        // Insert into `blogs` table first
        $stmt = $conn->prepare("INSERT INTO blogs (name, duration, overview, published_date, author, description) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $duration, $overview, $published_date, $author, $description]);

        // Get the last inserted blog ID
        $blog_id = $conn->lastInsertId();

        // Handle multiple images
        if (!empty($_FILES['images']['name'][0])) {
            $targetDir = "uploads/blogs/";

            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            foreach ($_FILES['images']['name'] as $key => $imageName) {
                $imageTmpName = $_FILES['images']['tmp_name'][$key];
                $uniqueImageName = time() . "_" . basename($imageName);
                $targetPath = $targetDir . $uniqueImageName;

                if (move_uploaded_file($imageTmpName, $targetPath)) {
                    $stmt = $conn->prepare("INSERT INTO blog_image (blog_id, image_path) VALUES (?, ?)");
                    $stmt->execute([$blog_id, $uniqueImageName]);
                }
            }
        }

        echo "Blog and images uploaded successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
