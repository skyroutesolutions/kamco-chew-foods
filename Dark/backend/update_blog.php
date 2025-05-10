<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['blog_id'];
    $name = $_POST['name'];
    $published_date = $_POST['published_date'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    
    try {
        // Check if a new image is uploaded
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image'];
            $imageName = time() . "_" . basename($image['name']);
            $targetPath = "uploads/blogs/" . $imageName;

            if (move_uploaded_file($image['tmp_name'], $targetPath)) {
                // Get old image
                $stmt = $conn->prepare("SELECT image FROM blogs WHERE id = ?");
                $stmt->execute([$id]);
                $oldImage = $stmt->fetchColumn();

                // Delete old image
                if ($oldImage && file_exists("../blogs/" . $oldImage)) {
                    unlink("../blogs/" . $oldImage);
                }

                // Update with new image
                $stmt = $conn->prepare("UPDATE blogs SET name = ?, image = ?, published_date = ?, author = ?, description = ? WHERE id = ?");
                $stmt->execute([$name, $imageName, $published_date, $author, $description, $id]);
            } else {
                echo "Error uploading image.";
                exit;
            }
        } else {
            // Update without changing the image
            $stmt = $conn->prepare("UPDATE blogs SET name = ?, published_date = ?, author = ?, description = ? WHERE id = ?");
            $stmt->execute([$name, $published_date, $author, $description, $id]);
        }

        echo "Blog updated successfully!";
    } catch (PDOException $e) {
        echo "Error updating blog: " . $e->getMessage();
    }
}
?>
