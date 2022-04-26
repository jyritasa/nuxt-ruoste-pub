<?php
    session_start();
    include 'settings.php';
    include 'connection.php';

    $psw = "";
    $usr = "";
    $first_name = "";
    $last_name = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $psw = $_POST['userPass'];
        $usr = $_POST['userName'];
        $first_name = $_POST['userFirstName'];
        $last_name = $_POST['userLastName'];
    }

    $insert_sql = "INSERT INTO users (username, password, first_name, last_name) VALUES (?, ?, ?, ?);";
    $saltedPassword = SALT . $psw;
    $hashedPassword = password_hash($saltedPassword , PASSWORD_DEFAULT);

    if($conn != null && $_SESSION["logged_in"] == true){
        $stmt = $conn->prepare($insert_sql);
        $row = $stmt->execute([$usr, $hashedPassword, $first_name, $last_name]);
    }
    $conn = null;
?>