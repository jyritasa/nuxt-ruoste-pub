<?php
    session_start();
    include 'settings.php';
    include 'connection.php';

    $id;
    $deleteSql = "DELETE FROM users WHERE id = ? LIMIT 1";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['deleteId'];
    }

    if($conn != null && $_SESSION["logged_in"] == true){
        $stmt = $conn->prepare($deleteSql);
        $rows = $stmt->execute([$id]);
    }
    $conn = null;
?>