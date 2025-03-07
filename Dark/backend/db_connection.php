<?php
// Secure Database Connection using PDO

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "srs_backend_kamco";

// Log file directory
$log_file = __DIR__ . "/logs/db_errors.log";

// Ensure the logs directory exists
if (!file_exists(__DIR__ . "/logs")) {
    mkdir(__DIR__ . "/logs", 0777, true);
}

try {
    // Establish a secure connection with PDO
    $conn = new PDO(
        "mysql:host=$servername;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );

} catch (PDOException $e) {
    // Log the error
    file_put_contents($log_file, "[" . date("Y-m-d H:i:s") . "] DB Error: " . $e->getMessage() . "\n", FILE_APPEND);
    die("Database connection failed. Please try again later.");
}
?>
