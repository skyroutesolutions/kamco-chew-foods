<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $status = $_POST['status'];


    if (!empty($category_id) && !empty($category_name) && !empty($status)) {
        $stmt = $conn->prepare("UPDATE categories SET name = :name, status = :status WHERE id = :id");
        $stmt->execute(['name' => $category_name, 'status' => $status,  'id' => $category_id]);

        echo "Category updated successfully!";
    } else {
        echo "Please fill in all fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
