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
	<title>MovieStar  | Contact</title>

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


								<li class="header__nav-item">
									<a href="movielist.php" class="header__nav-link">Movies</a>
								</li>

                                <li class="header__nav-item">
                                    <a href="reservationList.php" class="header__nav-link">Reservation</a>
                                </li>

								<li class="header__nav-item">
									<a href="contact.php" class="header__nav-link header__nav-link--active">Contact</a>
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
						<h2 class="section__title">Contact</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="#">Home</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Contact</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- faq -->
	<section class="section">
		<div class="container">
            <div class="col-12">
                <form action="sendemail.php" method="POST" class="form form--contacts">
                    <input name="name" type="text" class="form__input" placeholder="Your Name">
                    <input name="email" type="text" class="form__input" placeholder="Email">
                    <input name="subject" type="text" class="form__input" placeholder="Subject">
                    <textarea id="text" name="message" class="form__textarea" placeholder="Type your message..."></textarea>
                    <button type="submit" class="form__btn">Send</button>
                </form>
            </div>
        </div>
	</section>
	<!-- end faq -->

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