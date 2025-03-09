<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = $_POST['category_name'];
    $status = $_POST['status'];


    if (!empty($category_name) && !empty($status)) {
        $stmt = $conn->prepare("INSERT INTO categories (name, status) VALUES (:name, :status)");
        $stmt->execute(['name' => $category_name, 'status' => $status]);

        echo "Category added successfully!";
    } else {
        echo "Please fill in all fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
