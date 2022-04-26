<?php
    session_start();
    include 'settings.php';
    include 'connection.php';

    $username = "";
    $first_name = "";
    $last_name = "";
    $id;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['userFirstName'];
        $last_name = $_POST['userLastName'];
        $username = $_POST['username'];
        $id = $_POST['userId'];
    }

    $updateSql = "UPDATE users SET username = ?, first_name = ?, last_name = ? WHERE id = ? LIMIT 1;";

    if($conn != null && $_SESSION["logged_in"] == true){
        $stmt = $conn->prepare($updateSql);
        $stmt->execute([$username, $first_name, $last_name, $id]);
    }
    $conn = null;
?>