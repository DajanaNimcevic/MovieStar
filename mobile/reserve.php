<?php
session_start();
require 'db_config.php';
if (isset($_SESSION['id'])) {
    $reservations = [];
    $user = $_SESSION['id'];
    $sql = "SELECT s.id_screening as id, COUNT(r.id_reservation) as seats, m.title, s.start
                FROM reservation r 
                    JOIN screening s ON r.id_screening = s.id_screening
                    JOIN movie m ON m.id_movie = s.id_movie
                WHERE r.id_user = $user
                AND s.start > NOW()
                GROUP BY r.id_screening";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $reservations[] = $row;
    }
}


?>
<html>
<body>
<div class="catalog">
		<div class="container">
			<div class="row justify-content-md-center">
                <?php if ($reservations) { ?>
                    <div class="col-6 col-sm-6 col-lg-6">
                        <table class="table table-white">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Naziv</th>
                                <th scope="col">Start</th>
                                <th scope="col">Broj mesta</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($reservations as $reservation) { ?>
                                <tr>
                                    <th scope="row"><?= $reservation['id'] ?></th>
                                    <td><?= $reservation['title'] ?></td>
                                    <td><?= (DateTime::createFromFormat('Y-m-d H:i:s' ,$reservation['start']))->format('d.m.Y. H:i')  ?></td>
                                    <td><?= $reservation['seats'] ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <a href="logout.php"><button>Logout</button></a>
                    </div>
                <?php } else { ?>
                    <h2 style="color: white">You have no reservations</h2>
                <?php } ?>
			</div>
		</div>
	</div>
</body>
</html>