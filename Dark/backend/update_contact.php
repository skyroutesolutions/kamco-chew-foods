<?php
include('db_connection.php'); // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
        // Update the contact
        $stmt = $conn->prepare("UPDATE contacts SET name = :name, email = :email, subject = :subject, message = :message WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':email' => $email,
            ':subject' => $subject,
            ':message' => $message
        ]);

        echo "Contact updated successfully";
    } catch (PDOException $e) {
        file_put_contents($log_file, "[" . date("Y-m-d H:i:s") . "] DB Error: " . $e->getMessage() . "\n", FILE_APPEND);
        echo "Error updating contact";
    }
}
?>
