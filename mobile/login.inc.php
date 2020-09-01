<?php
session_start();
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
        header('Location: index.php');
        exit;

    }
    $_SESSION['username'] = $row['username'];
    $_SESSION['id'] = $row['id_user'];
    $_SESSION['isAdmin'] = $row['admin'];


    header('Location: reserve.php');
    exit;
} else {

    header('Location: index.php');
    exit;
}
//$id=0;
//$username = mysqli_real_escape_string($conn, $_POST["username"]);
//$password = mysqli_real_escape_string($conn, $_POST["password"]);
//
//$sql = "SELECT * FROM user WHERE username = '$username'";
//$result = mysqli_query($conn, $sql);
//
//
//if(mysqli_num_rows($result) > 0 or !password_verify($password,$result['password']))
//{
//    while($row = $result->fetch_array())//$row = mysqli_fetch_array($result, MYSQLI_BOTH))
//    {
//        $id = $row["id_user"];
//        $admin = $row["admin"];
//    }
//    $_SESSION['username'] = $username;
//    $_SESSION['id'] = $id;
//    $_SESSION['isAdmin'] = $admin;
//    header("Location: reserve.php");
//}
//else {
//    header("Location: login.php?error=1");
//}