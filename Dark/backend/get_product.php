<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $product_id = $_GET['id'];

    if (!empty($product_id)) {
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $product_id]);
        $product = $stmt->fetch();

        if ($product) {
            echo json_encode($product);
        } else {
            echo json_encode(['error' => 'Product not found.']);
        }
    } else {
        echo json_encode(['error' => 'Invalid product ID.']);
    }
} else {
    echo "Invalid request method.";
}
?>
