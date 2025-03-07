<?php
include('db_connection.php'); // Include the database connection file

if (isset($_GET['id'])) {
    $contactId = $_GET['id'];

    try {
        // Fetch the specific contact by ID
        $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = :id");
        $stmt->execute([':id' => $contactId]);
        $contact = $stmt->fetch();

        if ($contact) {
            echo json_encode($contact);
        } else {
            echo json_encode(["error" => "Contact not found"]);
        }
    } catch (PDOException $e) {
        file_put_contents($log_file, "[" . date("Y-m-d H:i:s") . "] DB Error: " . $e->getMessage() . "\n", FILE_APPEND);
        echo json_encode(["error" => "Error fetching contact"]);
    }
}
?>
