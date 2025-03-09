<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $category_id = $_GET['id'];

    if (!empty($category_id)) {
        $stmt = $conn->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->execute(['id' => $category_id]);
        $category = $stmt->fetch();

        if ($category) {
            echo json_encode($category);
        } else {
            echo json_encode(['error' => 'Category not found.']);
        }
    } else {
        echo json_encode(['error' => 'Invalid category ID.']);
    }
} else {
    echo "Invalid request method.";
}
?>
