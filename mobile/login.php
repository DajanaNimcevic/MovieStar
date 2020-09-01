<html lang="en">

<head>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="text-alling: center">
    <h2>Login</h2>
    <form action = "login.inc.php" method = "POST">
        <label for="username">Username</label><br><input type = "text" name = "username" class = "form-control"/><br>
        <label for="password">Password</label><br><input type = "password" name = "password" class = "form-control" /><br>
        <button  type = "submit" name="submit" class = "btn btn-info btn-block mt-3"><i class="fa fa-sign-in"></i> Login</button>

        <?php
            if(isset($_GET['error'])) {
                if($_GET['error'] == '1')
                    echo '<p class="text-danger text-center">Your password or username is incorrect</p>';
            } ?>
    </form>
</body>
</html>