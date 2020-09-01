<?php
session_start();
require "./db_config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mobile</title>
</head>
<body>
    <?php
        if(!isset($_SESSION['id_user'])){
            require "./login.php";
        }
        else{
            require "./reserve.php";
        }
        ?>
</body>
</html>