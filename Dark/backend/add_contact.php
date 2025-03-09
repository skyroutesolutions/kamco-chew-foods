<?php
include('db_connection.php'); // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT COUNT(*) FROM contacts WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $emailExists = $stmt->fetchColumn();

        if ($emailExists) {
            echo "Error: Email must be unique.";
            exit;
        }

        // Insert new contact
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':subject' => $subject,
            ':message' => $message
        ]);


        echo "Contact added successfully";
    } catch (PDOException $e) {
        file_put_contents($log_file, "[" . date("Y-m-d H:i:s") . "] DB Error: " . $e->getMessage() . "\n", FILE_APPEND);
        echo "Error adding contact: " . $e->getMessage();

    }
}

?>
