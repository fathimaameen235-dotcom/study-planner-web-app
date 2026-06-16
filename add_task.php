<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
    die("Login Required");
}

$user_id = $_SESSION['user_id'];
<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
    die("Login Required");
}

$user_id = $_SESSION['user_id'];

$subject = $_POST['subject'];
$task_name = $_POST['task_name'];
$study_date = $_POST['study_date'];

$stmt = $conn->prepare(
    "INSERT INTO tasks(user_id,subject,task_name,study_date)
     VALUES(?,?,?,?)"
);

$stmt->bind_param(
    "isss",
    $user_id,
    $subject,
    $task_name,
    $study_date
);

if($stmt->execute()){
    echo "Task Added";
}else{
    echo "Error";
}
?>
$subject = $_POST['subject'];
$task_name = $_POST['task_name'];
$study_date = $_POST['study_date'];

$stmt = $conn->prepare(
    "INSERT INTO tasks(user_id,subject,task_name,study_date)
     VALUES(?,?,?,?)"
);

$stmt->bind_param(
    "isss",
    $user_id,
    $subject,
    $task_name,
    $study_date
);

if($stmt->execute()){
    echo "Task Added";
}else{
    echo "Error";
}
?>