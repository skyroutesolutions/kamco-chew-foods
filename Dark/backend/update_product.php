<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $status = $_POST['status'];
    $category_id = $_POST['category_id'];
    $description = $_POST['product_description'];

    if (!empty($product_id) && !empty($product_name) && !empty($status) && !empty($description)) {
        $stmt = $conn->prepare("UPDATE products SET name = :name, status = :status, description = :description, category_id = :category_id, price = :price WHERE id = :id");

        $stmt->execute(['name' => $product_name, 'status' => $status, 'description' => $description, 'category_id' => $category_id, 'price' => $_POST['product_price'], 'id' => $product_id]);

        echo "Product updated successfully!";
    } else {
        echo "Please fill in all fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
