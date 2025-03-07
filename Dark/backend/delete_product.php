<?php
include('db_connection.php'); // Include the database connection file

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        // Delete the contact
        $stmt = $conn->prepare("DELETE FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);

        echo "Contact deleted successfully";
    } catch (PDOException $e) {
        file_put_contents($log_file, "[" . date("Y-m-d H:i:s") . "] DB Error: " . $e->getMessage() . "\n", FILE_APPEND);
        echo "Error deleting contact";
    }
}
?>
