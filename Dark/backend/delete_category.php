<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['id'];

    if (!empty($category_id)) {
        $stmt = $conn->prepare("DELETE FROM categories WHERE id = :id");
        $stmt->execute(['id' => $category_id]);
        echo "Category deleted successfully!";
    } else {
        echo "Invalid category ID.";
    }
} else {
    echo "Invalid request method.";
}
?>
