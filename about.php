<?php
    require_once('includes/db_config.php');
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
	<title>MovieStar | About</title>

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

							<!-- dropdown -->
							<li class="dropdown header__nav-item">
								<a href="about.php" class="header__nav-link header__nav-link--active">About Us</a>
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
</header>
<!-- end header -->

<!-- page title -->
<section class="section section--first section--bg" data-bg="img/section/section.jpg">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section__wrap">
					<!-- section title -->
					<h2 class="section__title">About Us</h2>
					<!-- end section title -->

					<!-- breadcrumb -->
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="#">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">About Us</li>
					</ul>
					<!-- end breadcrumb -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end page title -->

<!-- about -->
<section class="section">
	<div class="container">
		<div class="row">
			<!-- section title -->
			<div class="col-12">
				<h2 class="section__title"><b>MovieStar</b> – Best Place for Movies</h2>
			</div>
			<!-- end section title -->

			<!-- section text -->
			<div class="col-12">
				<p class="section__text"> Within the MovieStar cinema, next to the cinema hall, there will be a gallery space with a permanent exhibition dedicated to the history
					of cinematography in Vojvodina, with a special emphasis on the history of cinematography in Subotica and Palić. Through permanent exhibitions of photographs
					and technical exhibits, visitors will have the opportunity to learn about the history of cinema. Cinematography is the only art whose development is directly
					related to the development of technical solutions for image and sound carriers. The museum will have a permanent exhibition space, space for guest exhibitions,
					a hall for regular cinema repertoire that  will be used during the day for educational screenings of museum visitors, as well as a summer amphitheater for
					screenings and outdoor performances.</p>

				<p class="section__text section__text--last-with-margin">For the fifth year in a row, the MovieStar cinema has been functioning as one of the locations of the Palić European
					Film Festival, one of the 5 best European festivals in 2017, organized by EFA - the European Festival Organization.</p>
			</div>
			<!-- end section text -->

			<!-- feature -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="feature">
					<i class="icon ion-ios-tv feature__icon"></i>
					<h3 class="feature__title">Ultra HD</h3>
					<p class="feature__text">All movies are in UHD resolution, projected by the best cameras right now.</p>
				</div>
			</div>
			<!-- end feature -->

			<!-- feature -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="feature">
					<i class="icon ion-ios-film feature__icon"></i>
					<h3 class="feature__title">Film</h3>
					<p class="feature__text">We have a selection of the best and hottest movies, along with the premieres of the new ones. </p>
				</div>
			</div>
			<!-- end feature -->

			<!-- feature -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="feature">
					<i class="icon ion-ios-trophy feature__icon"></i>
					<h3 class="feature__title">Awards</h3>
					<p class="feature__text">One of the 5 best European festivals in 2017, organized by EFA - the European Festival Organization.</p>
				</div>
			</div>
			<!-- end feature -->

			<!-- feature -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="feature">
					<i class="icon ion-ios-notifications feature__icon"></i>
					<h3 class="feature__title">Mobile App</h3>
					<p class="feature__text">You can see all your reservation in the app.</p>
				</div>
			</div>
			<!-- end feature -->

			<!-- feature -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="feature">
					<i class="icon ion-ios-rocket feature__icon"></i>
					<h3 class="feature__title">Reservation</h3>
					<p class="feature__text">Book your seats easy and online. </p>
				</div>
			</div>
			<!-- end feature -->

			<!-- feature -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="feature">
					<i class="icon ion-ios-globe feature__icon"></i>
					<h3 class="feature__title">Multi Language Subtitles </h3>
					<p class="feature__text">Watch our movies with subtitles in multiple languages.</p>
				</div>
			</div>
			<!-- end feature -->
		</div>
	</div>
</section>
<!-- end about -->

<!-- how it works -->
<section class="section section--dark">
	<div class="container">
		<div class="row">
			<!-- section title -->
			<div class="col-12">
				<h2 class="section__title section__title--no-margin">How it works?</h2>
			</div>
			<!-- end section title -->

			<!-- how box -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="how">
					<span class="how__number">01</span>
					<h3 class="how__title">Create your account</h3>
					<p class="how__text">Register with us for an easy access to our reservation system.</p>
				</div>
			</div>
			<!-- ebd how box -->

			<!-- how box -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="how">
					<span class="how__number">02</span>
					<h3 class="how__title">Choose your seat</h3>
					<p class="how__text">Book your seats fast and easy.</p>
				</div>
			</div>
			<!-- ebd how box -->

			<!-- how box -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="how">
					<span class="how__number">03</span>
					<h3 class="how__title">Enjoy the movie</h3>
					<p class="how__text"> Relax in our comfortable environment.</p>
				</div>
			</div>
			<!-- ebd how box -->
		</div>
	</div>
</section>
<!-- end how it works -->

<!-- partners -->


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