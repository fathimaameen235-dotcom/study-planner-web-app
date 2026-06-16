<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Content-Type: application/json');
    echo json_encode([]);
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare(
    "SELECT * FROM tasks
     WHERE user_id=?
     ORDER BY study_date ASC"
);

$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

$tasks = [];

while($row = $result->fetch_assoc()){
    $tasks[] = $row;
}

header('Content-Type: application/json');
echo json_encode($tasks);
?>
