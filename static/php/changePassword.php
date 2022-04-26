<?php
    session_start();
    include 'settings.php';
    include 'connection.php';

    $password = "";
    $id;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST['userPass'];
        $id = $_POST['userId'];
    }

    $updateSql = "UPDATE users SET password = ? WHERE id = ? LIMIT 1;";
    $saltedPassword = SALT . $password;
    $hashedPassword = password_hash($saltedPassword , PASSWORD_DEFAULT);

    if($conn != null && $_SESSION["logged_in"] == true){
        $stmt = $conn->prepare($updateSql);
        $stmt->execute([$hashedPassword, $id]);
    }
    $conn = null;
?>