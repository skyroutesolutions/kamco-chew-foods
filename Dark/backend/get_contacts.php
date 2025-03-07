<?php
include('db_connection.php'); // Include the database connection file

try {
    // Fetch all contacts
    $stmt = $conn->query("SELECT * FROM contacts");
    $contacts = $stmt->fetchAll();

    if ($contacts) {
        foreach ($contacts as $contact) {
            echo "<tr>
                    <td>" . $contact['id'] . "</td>
                    <td>" . $contact['name'] . "</td>
                    <td>" . $contact['email'] . "</td>
                    <td>" . $contact['subject'] . "</td>
                    <td>" . $contact['message'] . "</td>
                   <td>" . $contact['created_at'] . "</td>

                    <td>
                        <button class='btn btn-warning edit-btn' data-id='" . $contact['id'] . "'>Edit</button>
                        <button class='btn btn-danger delete-btn' data-id='" . $contact['id'] . "'>Delete</button>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No contacts found</td></tr>";
    }
} catch (PDOException $e) {
    file_put_contents($log_file, "[" . date("Y-m-d H:i:s") . "] DB Error: " . $e->getMessage() . "\n", FILE_APPEND);
    echo "<tr><td colspan='6'>Error fetching contacts</td></tr>";
}
?>
