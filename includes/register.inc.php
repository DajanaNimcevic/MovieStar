<?php
require "db_config.php";

header('Content-Type: application/json');
if(isset($_POST['js'])){

    $data = [
        "username" => mysqli_real_escape_string($conn,trim($_POST['username'])),
        "email" => mysqli_real_escape_string($conn,trim($_POST['email'])),
        "password" => mysqli_real_escape_string($conn,trim($_POST['password']))
    ];

    foreach ($data as $key => $value) {
        if (empty($value)) {
            exit(json_encode(['error' => 'Please fill in all fields']));
        }
    }
    $password = password_hash($data['password'],PASSWORD_DEFAULT);
    if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) {
        exit(json_encode(['error' => 'Email is not valid']));
    }

    $sql = "SELECT id_user FROM user WHERE username = '{$data['username']}';";
    $query = mysqli_query($conn,$sql);
    if($row = mysqli_num_rows($query) > 0) {
        exit(json_encode(['error' => 'That username is already taken!']));
    }

    $sql = "SELECT id_user FROM user WHERE email = '{$data['email']}';";
    $query = mysqli_query($conn,$sql);
    if($row = mysqli_num_rows($query) > 0) {
        exit(json_encode(['error' => 'You are already registered!']));
    }

    $sql = "INSERT INTO user(email,username,password) VALUES('{$data['email']}','{$data['username']}','{$password}');";
    $query = mysqli_query($conn,$sql);
    if(!mysqli_affected_rows($conn)) {
        exit(json_encode(['error' => 'Oops something went wrong']));
    }

    exit(json_encode(['success' => 'Thank you for your registration. You can now sign in!']));

} else {

    exit(json_encode(['error' => 'Oops something went wrong']));

}

/*
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password1'];
$password2 = $_POST['password2'];

$logged = 0;
$sql2 = "SELECT * FROM user WHERE username = '$username';";
$result2 = mysqli_query($connect, $sql2) or die(mysqli_error($connect)); // CHECK USERNAME
$error = 0;
if (mysqli_num_rows($result2) > 0) {
    $error = 1;
}
$password3 = password_hash($password,PASSWORD_DEFAULT);
$sql = "INSERT INTO user (username, password, email) values ('$username', '$password3', '$email')";
if ($password == $password2 and $error == 0) {
    $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    header("location: ../login.php");
} elseif ($error == 1 and $password != $password2) {
    header("Location: ../register.php?nav=3");
} elseif ($error == 1) {
    header("Location: ../register.php?nav=1");
} elseif ($password != $password2) {
    header("Location: ../register.php?nav=2");
}
*/

