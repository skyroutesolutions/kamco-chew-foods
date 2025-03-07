<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        // Get the image name
        $stmt = $conn->prepare("SELECT image FROM blogs WHERE id = ?");
        $stmt->execute([$id]);
        $image = $stmt->fetchColumn();

        // Delete from database
        $stmt = $conn->prepare("DELETE FROM blogs WHERE id = ?");
        $stmt->execute([$id]);

        // Delete image file
        if ($image && file_exists("../blogs/" . $image)) {
            unlink("../blogs/" . $image);
        }

        echo "Blog deleted successfully!";
    } catch (PDOException $e) {
        echo "Error deleting blog: " . $e->getMessage();
    }
}
?>
