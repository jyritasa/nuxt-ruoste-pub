<?php
    session_start();
    include 'settings.php';
    include 'connection.php';

    $users_sql = "SELECT id, username, first_name, last_name FROM users";

    if($conn != null && $_SESSION["logged_in"] == true){
        $stmt = $conn->prepare($users_sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    $conn = null;
    header('Content-Type: application/json');
    echo $JSON = json_encode($rows);
?>