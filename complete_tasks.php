<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo "Login Required";
    exit();
}

$user_id = $_SESSION['user_id'];
$task_id = $_POST['task_id'];

$stmt = $conn->prepare(
    "UPDATE tasks
     SET status='Completed'
     WHERE id=? AND user_id=?"
);

$stmt->bind_param("ii", $task_id, $user_id);

if($stmt->execute()){
    echo "Task Completed";
}
?>
