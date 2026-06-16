<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header('Content-Type: application/json');
    echo json_encode([]);
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT task_name, study_date FROM tasks WHERE user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

$events = [];

while ($row = $result->fetch_assoc()) {
    $events[] = [
        "title" => $row['task_name'],
        "start" => $row['study_date']
    ];
}

header('Content-Type: application/json');
echo json_encode($events);
?>
