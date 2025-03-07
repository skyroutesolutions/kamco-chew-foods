<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $conn->query("SELECT p.id, p.name, p.status, p.description, p.price, c.name AS category_name FROM products p JOIN categories c ON p.category_id = c.id");


    $products = $stmt->fetchAll();

    foreach ($products as $product) {
        echo "<tr>
                <td>{$product['id']}</td>
                <td>{$product['name']}</td>
                <td>{$product['description']}</td>
                <td>{$product['category_name']}</td>
                <td>{$product['price']}</td>
                <td>{$product['status']}</td>

                <td>
                    <button class='edit-btn' style='color:black' data-id='{$product['id']}'>Edit</button>
                    <button class='delete-btn' style='color:black' data-id='{$product['id']}'>Delete</button>
                </td>
              </tr>";
    }
} else {
    echo "Invalid request method.";
}
?>
