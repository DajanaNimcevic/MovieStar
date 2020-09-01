<?php
    require_once('includes/db_config.php');

    $sql = "SELECT * FROM movie";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $movies[] = $row;
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
	<link rel="stylesheet" href="css/main.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<title>MovieStar | Home </title>

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
                                    <a href="index.php" class="header__nav-link header__nav-link--active">Home</a>
                                </li>
                                <!-- end dropdown -->

                                <!-- dropdown -->
                                <li class="header__nav-item">
                                    <a href="movielist.php" class="header__nav-link">Movies</a>
                                </li>
                                <!-- end dropdown -->

                                <li class="header__nav-item">
                                    <a href="reservationList.php" class="header__nav-link">Reservation</a>
                                </li>

                                <li class="header__nav-item">
                                    <a href="contact.php" class="header__nav-link">Contact</a>
                                </li>
                                <li class="header__nav-item">
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

                                <!-- dropdown -->
                                <!-- end dropdown -->
                            </ul>
                            <!-- end header nav -->

							<!-- header auth -->
							<div class="header__auth">
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
        <!-- end header search -->
    </header>
    <!-- end header -->

    <!-- home -->
    <section class="home">
        <!-- home bg -->
        <div class="owl-carousel home__bg">
            <div class="item home__cover" data-bg="img/home/home__bg.jpg"></div>
            <div class="item home__cover" data-bg="img/home/home__bg2.jpg"></div>
            <div class="item home__cover" data-bg="img/home/home__bg3.jpg"></div>
            <div class="item home__cover" data-bg="img/home/home__bg4.jpg"></div>
        </div>
        <!-- end home bg -->

        <div class="container">
            <div class="row">
                <div class="col-12">

                    <button class="home__nav home__nav--prev" type="button">
                        <i class="icon ion-ios-arrow-round-back"></i>
                    </button>
                    <button class="home__nav home__nav--next" type="button">
                        <i class="icon ion-ios-arrow-round-forward"></i>
                    </button>
                </div>

                <div class="col-12">
                    <div class="owl-carousel home__carousel">

                        <?php foreach ($movies as $movie) { ?>
                            <div class="item">
                                <!-- card -->
                                <div class="card card--big">
                                    <div class="card__cover">
                                        <img src="img/movies/<?= $movie['picture'] ?>" alt="">
                                        <a href="details.php?movie=<?= $movie['id_movie'] ?>" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    </div>
                                    <div class="card__content">
                                        <h3 class="card__title"><a href="details.php?movie=<?= $movie['id_movie'] ?>"><?= $movie['title'] ?></a></h3>
<!--                                        <span class="card__category">-->
<!--										<a href="#">Action</a>-->
<!--										<a href="#">Triler</a>-->
<!--									</span>-->
<!--                                        <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>-->
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- content -->
    <section class="content">
        <div class="content__head">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- content title -->
                        <h2 class="content__title">WATCH THIS</h2>
                        <!-- end content title -->

                        <!-- content tabs nav -->
                        <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">NEW RELEASES</a>
                            </li>
<!---->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">ACTION</a>-->
<!--                            </li>-->
<!---->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">COMEDY</a>-->
<!--                            </li>-->
<!---->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">ROMANCE</a>-->
<!--                            </li>-->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false">DRAMA</a>-->
<!--                            </li>-->
                        </ul>

                        <!-- end content tabs nav -->

                        <!-- content mobile tabs nav -->
                        <div class="content__mobile-tabs" id="content__mobile-tabs">
                            <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="Watch this">
                                <span></span>
                            </div>

                            <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">WATCH THIS</a></li>

                                </ul>

                            </div>
                        </div>
                        <!-- end content mobile tabs nav -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- content tabs -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
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
<!--                                                <span class="card__category">-->
<!--												<a href="#">Action</a>-->
<!--												<a href="#">Triler</a>-->
<!--											</span>-->

<!--                                                <div class="card__wrap">-->
<!--                                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>-->
<!---->
<!--                                                    <ul class="card__list">-->
<!--                                                        <li>HD</li>-->
<!--                                                        <li>16+</li>-->
<!--                                                    </ul>-->
<!--                                                </div>-->

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
    </section>
    <!-- end content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 ml-50 offset-xl-3 " style="color: white">
                    <h3 class="font-weight-bold serif text-white"><pre>     <img src="img/movielogo1.png"></pre></h3>
                </div>

                <div class="col-12 text-center mb-4 offset-4 pl-5">
                    <a href="movielist.php" class="footer__title">Movies</a>
                    <span class="mx-15"></span>
                    <a href="reservationList.php" class="footer__title">Reservation</a>
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