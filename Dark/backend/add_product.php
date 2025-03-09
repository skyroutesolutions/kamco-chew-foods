<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $status = $_POST['status'];
    $category_id = $_POST['category_id'];

    $description = $_POST['product_description'];

    // Debugging: Log incoming data
    error_log("Product Name: $product_name, Status: $status, Price: " . $_POST['product_price']);
    
    if (!empty($product_name) && !empty($status) && !empty($description)) {


        $stmt = $conn->prepare("INSERT INTO products (name, status, description, category_id, price) VALUES (:name, :status, :description, :category_id, :price)");


        $stmt->execute(['name' => $product_name, 'status' => $status, 'description' => $_POST['product_description'], 'category_id' => $category_id, 'price' => $_POST['product_price']]);



        echo "Product added successfully!";
    } else {
        echo "Please fill in all fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
