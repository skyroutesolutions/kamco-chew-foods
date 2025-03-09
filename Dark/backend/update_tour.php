<?php
session_start();
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tourId = $_POST['tour_id'] ?? null;
    $name = $_POST['name'] ?? '';
    $duration_day = $_POST['duration_day'] ?? '';
    $duration_night = $_POST['duration_night'] ?? '';
    $validity_date = $_POST['validity_date'] ?? '';
    $best_time = $_POST['best_time'] ?? '';
    $region = $_POST['region'] ?? '';
    $price = $_POST['price'] ?? '';
    $activities = $_POST['activities'] ?? '';
    $routes = $_POST['routes'] ?? '';
    $overview = $_POST['overview'] ?? '';
    $itinerary = $_POST['itinerary'] ?? '';
    $tour_highlight = $_POST['tour_highlight'] ?? '';
    $price_includes = $_POST['price_includes'] ?? '';
    $designation = $_POST['designation_id'] ?? '';

    if (!$tourId) {
        echo json_encode(['message' => 'Tour ID is required.']);
        exit();
    }

    try {
        $conn->beginTransaction();

        // Update tour details
        $stmt = $conn->prepare("UPDATE tours SET 
            name = ?, duration_day = ?, duration_night = ?, validity_date = ?, best_time = ?, region = ?, price = ?, 
            activities = ?, routes = ?, designation_id = ? 
            WHERE id = ?");
        
        $stmt->execute([$name, $duration_day, $duration_night, $validity_date, $best_time, $region, $price, 
            $activities, $routes, $designation, $tourId]);

        // Update tour details table
        $stmt = $conn->prepare("UPDATE tour_details SET 
            overview = ?, itinerary = ?, tour_highlight = ?, price_includes = ? WHERE tour_id = ?");
        
        $stmt->execute([$overview, $itinerary, $tour_highlight, $price_includes, $tourId]);

        $conn->commit();
        echo json_encode(['message' => 'Tour updated successfully']);
    } catch (PDOException $e) {
        $conn->rollBack();
        echo json_encode(['message' => 'Error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['message' => 'Invalid request method.']);
}



?>
