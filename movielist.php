<?php
    require_once('includes/db_config.php');

    if (isset($_GET['movie'])) {
        $sql = "SELECT * FROM movie WHERE title LIKE '%". $_GET['movie'] ."%'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $movies[] = $row;
        }
    } else {
        $sql = "SELECT * FROM movie";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $movies[] = $row;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet"> 

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/plyr.css">
	<link rel="stylesheet" href="css/photoswipe.css">
	<link rel="stylesheet" href="css/default-skin.css">
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="stylesheet" href="css/main.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dajana Nimcevic">
	<title>MovieStar | Movie list</title>

</head>
<body class="body">
	
	<!-- header -->
	<header class="header">
		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<!-- header logo -->
							<a href="index.php" class="header__logo">
								<img src="img/movielogo1.png" alt="">
							</a>
							<!-- end header logo -->

							<!-- header nav -->
							<ul class="header__nav">
								<!-- dropdown -->
								<li class="header__nav-item">
									<a href="index.php" class="header__nav-link">Home</a>

								</li>
								<li class="header__nav-item">
									<a href="movielist.php" class="header__nav-link header__nav-link--active">Movies</>
								</li>

								<li class="header__nav-item">
									<a href="reservationList.php" class="header__nav-link">Reservation</a>
								</li>

								<li class="header__nav-item">
									<a href="contact.php" class="header__nav-link">Contact</a>
								</li>

								<li class="dropdown header__nav-item">
									<a href="about.php" class="header__nav-link">About us</a>
								</li>
                                <?php
                                if (isset($_SESSION['isAdmin'])) {
                                    if($_SESSION['isAdmin'] == 1) {
                                        echo' <li class="header__nav-item">
                                                <a href="admin/index.php" class="header__nav-link">Admin</a>
                                            </li>';
                                    }
                                }
                                ?>

							</ul>
							<!-- end header nav -->

							<!-- header auth -->
							<div class="header__auth">
								<button class="header__search-btn" type="button">
									<i class="icon ion-ios-search"></i>
								</button>

                                <?php if (isset($_SESSION['id'])) { ?>
                                    <a href="logout.php" class="header__sign-in">
                                        <i class="icon ion-ios-log-in"></i>
                                        <span>Logout</span>
                                    </a>
                                <?php } else { ?>
                                    <a href="signin.php" class="header__sign-in">
                                        <i class="icon ion-ios-log-in"></i>
                                        <span>Sign in</span>
                                    </a>
                                <?php } ?>
							</div>
							<!-- end header auth -->

							<!-- header menu btn -->
							<button class="header__btn" type="button">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<!-- end header menu btn -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- header search -->
		<form action="movielist.php" method="GET" class="header__search">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__search-content">
							<input name="movie" type="text" placeholder="Search for a movie that you are looking for">

							<button type="submit">search</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- end header search -->
	</header>
	<!-- end header -->

	<!-- page title -->
	<section class="section section--first section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Movie list</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="#">Home</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Movie list</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- filter -->
	<div class="filter">
		<div class="container">
			<div class="row">
				<div class="col-12"></div>
			</div>
		</div>
	</div>
	<!-- end filter -->

	<!-- catalog -->
	<div class="catalog">
		<div class="container">
			<div class="row">
                <?php foreach ($movies as $movie) { ?>
                    <!-- card -->
                    <div class="col-6 col-sm-12 col-lg-6">
                        <div class="card card--list">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="card__cover">
                                        <img src="img/movies/<?= $movie['picture'] ?>" alt="">
                                        <a href="details.php?movie=<?= $movie['id_movie'] ?>" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-8">
                                    <div class="card__content">
                                        <h3 class="card__title"><a href="details.php?movie=<?= $movie['id_movie'] ?>"><?= $movie['title'] ?></a></h3>
                                        <div class="card__description">
                                            <p><?= $movie['description'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                <?php } ?>
			</div>
		</div>
	</div>
	<!-- end catalog -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-12 ml-50 offset-xl-3 " style="color: white">
					<h3 class="font-weight-bold serif text-white"><pre>     <img src="img/movielogo1.png"></pre></h3>
				</div>

				<div class="col-12 text-center mb-4 offset-4 pl-5">
					<a href="movielist.php" class="footer__title">Movies</a>
					<span class="mx-15"></span>
					<a href="reservation.php" class="footer__title">Reservation</a>
					<span class="mx-3"></span>
					<a href="contact.php" class="footer__title">Contact</a>
					<span class="mx-3"></span>
					<a href="about.php" class="footer__title">About Us</a>
				</div>

				<div class="col-2 offset-5">

				</div>
				<div class="col-md-12">
					<div class="footer__copyright col-md-12" style="color: white">

					</div>
					<div class="col-md-12 offset-4" style="color: white">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Dajana Nimčević
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<!-- JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/wNumb.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/jquery.morelines.min.js"></script>
	<script src="js/photoswipe.min.js"></script>
	<script src="js/photoswipe-ui-default.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>