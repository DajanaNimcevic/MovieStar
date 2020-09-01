<?php
    require_once('includes/db_config.php');
    if (!isset($_SESSION['id'])) {
        header("Location: signin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Movie Seat Booking</title>
</head>
<body>
<!--<div class="movie-container">
    <label>Choose a movie</label>
    <select id="movie">
        <option value="10">Avengers: Endgame ($10)</option>
        <option value="12">Joker ($12)</option>
        <option value="8">Toy Story 4 ($8)</option>
        <option value="9">The Lion King ($9)</option>
    </select>
</div>-->
<ul class="showcase">
    <li>
        <div class="seat"></div>
        <small>N/A</small>
    </li>
    <li>
        <div class="seat selected"></div>
        <small>Selected</small>
    </li>
    <li>
        <div class="seat occupied"></div>
        <small>Occupied</small>
    </li>
</ul>
<?php

if (isset($_GET['screening'])) {

    $id_screening = $_GET['screening'];

    $sql = "SELECT * FROM screening WHERE id_screening = $id_screening";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) === 0) {
        die(); // redirect
    }

    $logged_in_user = $_SESSION['id'];

    $sql = "SELECT res.id_user as user, s.row, s.number 
            FROM screening scr 
            LEFT JOIN reservation res ON scr.id_screening = res.id_screening
            LEFT JOIN seat s ON s.id_seat = res.id_seat
            WHERE scr.id_screening = $id_screening";

    $query = mysqli_query($conn,$sql);

    for ($i = 1; $i < 9; $i++){
        for ($j = 1; $j < 7; $j++){
            $seats[$i][$j] = 0;
        }
    }

    while($result = mysqli_fetch_assoc($query)) {
        $column = $result['number'];
        $row = $result['row'];
        $user = $result['user'];
        if ($logged_in_user === $user) {
            $seats[$column][$row] = 1;
        } else {
            $seats[$column][$row] = 2;
        }
    }
} else {
    header("Location: index.php");
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    if (isset($_POST['row'], $_POST['column'], $_POST['user'], $_POST['id_screening'])) {

        $row = mysqli_real_escape_string ($conn,$_POST['row']);
        $column = mysqli_real_escape_string ($conn,$_POST['column']);
        $user = mysqli_real_escape_string ($conn,$_POST['user']);
        $id_screening = mysqli_real_escape_string ($conn,$_POST['id_screening']);

        if (empty($row) or empty($column) or empty($user) or empty($id_screening)) {
            exit();
        }

        $sql = "SELECT * FROM reservation ORDER BY id_reservation DESC";
        $query = mysqli_query ($conn,$sql);
        while($result = mysqli_fetch_assoc($query)) {
            $id_reservation = $result['id_reservation'];
        }

        $sql = "SELECT * FROM seat WHERE row=".$row." AND number=".$column;
        $query = mysqli_query ($conn,$sql);
        while($result = mysqli_fetch_assoc($query)) {
            $id_seat = $result['id_seat'];
        }

        if ($action === 'reserve') {
            $sql = "INSERT INTO reservation(id_user,id_screening,id_seat) VALUES('$user','$id_screening','$id_seat');";
            $query = mysqli_query ($conn,$sql);
        }

        if ($action === 'remove') {
            $sql = 'DELETE FROM reservation WHERE id_screening = ' . $id_screening . ' AND id_seat = ' . $id_seat;
            $query = mysqli_query ($conn,$sql);
        }

    }
}
?>

<div class="container">
    <div class="screen"></div>
    <?php for ($i = 1; $i<7; $i++) { ?>
        <div class="row">
            <?php for ($j = 1; $j<9; $j++) { ?>
                <div class="seat <?=  $seats[$j][$i] == 1 ? 'selected' : ($seats[$j][$i] == 2 ? 'occupied' : '') ?>" data-row="<?= $i ?>" data-column="<?= $j ?>" data-user="<?=$logged_in_user?>" data-screening="<?=$id_screening?>"></div>
            <?php } ?>
        </div>
    <?php } ?>
    <br>
    <a href="reservationList.php" class="a-without-style">Save</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>
</body>
</html>
<?php
