<?php
    session_start();
    include 'settings.php';
    include 'connection.php';

    $password = "";
    $username = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST['loginPass'];
        $username = $_POST['loginName'];
    }

    $first_name = "";
    $last_name = "";
    $password_response = false;
    $login_resonse = false;
    $password_sql = "SELECT password FROM users WHERE username = ? LIMIT 1";
    $info_sql = "SELECT id, first_name, last_name FROM users WHERE username = ? LIMIT 1";

    $saltedPassword = SALT . $password;
    $hashedPassword = password_hash($saltedPassword , PASSWORD_DEFAULT);

    if($conn != null){
        $stmt = $conn->prepare($password_sql);
        $stmt->execute([$username]);
        $row = $stmt->fetch();
        if($row){
        $login_resonse = true;
        $fetchedPassword = $row['password'];
        if (password_verify($saltedPassword, $fetchedPassword)){
            $password_response = true;
            $stmt = $conn->prepare($info_sql);
            $stmt->execute([$username]);
            $row = $stmt->fetch();
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $user_id = $row['id'];
            }
        }
        if ($password_response == true) {
            $_SESSION['login_user'] = $username;
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION["logged_in"] = true;
        }
    }

    $response = array(
        "connection_response" => $conn_response,
        "login_response" => $login_resonse,
        "password_response" => $password_response,
        "last_name" => $last_name,
        "first_name" => $first_name,
        "user_id" => $user_id
    );
    
    $conn = null;
    header('Content-Type: application/json');
    echo $JSON = json_encode($response);
?>