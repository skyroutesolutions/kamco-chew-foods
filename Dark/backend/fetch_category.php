<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $conn->query("SELECT id, name, status FROM categories");

    $categories = $stmt->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($categories);
} else {
    echo "Invalid request method.";
}
