<?php

require_once("db_config.php");
$error = '';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if(!password_verify($password,$row['password']) or $count < 1) {
        header('Location: ../signin.php?error=true');
        exit;
    }

    $_SESSION['username'] = $row['username'];
    $_SESSION['id'] = $row['id_user'];
    $_SESSION['isAdmin'] = $row['admin'];

    header('Location: ../index.php');
    exit;
} else {

    header('Location: ../login.php?error=fatal');
    exit;
}