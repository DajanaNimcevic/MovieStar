<?php
require_once('includes/db_config.php');

    if (isset($_GET['movie'])) {
        $screenings = [];
        $id = $_GET['movie'];
        $sql = "SELECT * FROM movie WHERE id_movie = $id";
        $result = mysqli_query($conn, $sql);
        $movie = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $sql = "SELECT * FROM screening 
                WHERE id_movie = $id
                AND start > NOW()
                ORDER BY start ASC
                ";
        $result = mysqli_query($conn, $sql);
        while($screening = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $screenings[] = $screening;
        }
    } else {
        header("Location: index.php");
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
	<meta name="author" content="Dajana Nimcevic">
	<title>MovieStar | Details </title>

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
                                    <a href="movielist.php" class="header__nav-link header__nav-link--active">Movies</a>
                                </li>
                                <!-- end dropdown -->

                                <li class="header__nav-item">
                                    <a href="reservation.php" class="header__nav-link">Reservation</a>
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

	<!-- details -->
	<section class="section details">
		<!-- details background -->
		<div class="details__bg" data-bg="img/home/home__bg.jpg"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="details__title"><?= $movie['title'] ?></h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<img src="img/movies/<?= $movie['picture'] ?>" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
									<div class="card__description card__description--details">
                                        <?= $movie['description'] ?>
									</div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->

				<!-- player -->

				<div class="col-12 col-xl-6">
                    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="600" height="300" type="text/html" src="<?= $movie['trailer_link'] ?>?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0"></iframe><div style="position: absolute;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"><small style="line-height: 1.8;font-size: 0px;background: #fff;"> <a href="https://deloge.de/">Deloge</a> </small></div><style>.newst{position:relative;text-align:right;height:420px;width:520px;} #gmap_canvas img{max-width:none!important;background:none!important}</style></div>
				</div>
				<!-- end player -->

				<div class="col-12">
					<div class="details__wrap">
						<!-- availables -->
						<div class="details__devices">
							<span class="details__devices-title">Book tickets:</span>
							<ul class="details__devices-list">
                                <?php if ($screenings) { ?>
                                <?php foreach ($screenings as $screening) { ?>
								<li><span><a href="reservation.php?screening=<?= $screening['id_screening'] ?>">Reserve </a> - <?= (DateTime::createFromFormat('Y-m-d H:i:s' ,$screening['start']))->format('d.m.Y. H:i') ?></span></li>
                                <?php } ?>
                                <?php } else { ?>
                                <h2 style="color: white">No screenings available right now</h2>
                                <?php } ?>

							</ul>
						</div>
						<!-- end availables -->
                        <a href="<?= $movie['imdb_link'] ?>" target="_blank"><img src="icon/imdb.png" alt="imdb"></a>
					</div>

				</div>

			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

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

	<!-- Root element of PhotoSwipe. Must have class pswp. -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

		<!-- Background of PhotoSwipe. 
		It's a separate element, as animating opacity is faster than rgba(). -->
		<div class="pswp__bg"></div>

		<!-- Slides wrapper with overflow:hidden. -->
		<div class="pswp__scroll-wrap">

			<!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
			<!-- don't modify these 3 pswp__item elements, data is added later on. -->
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>

			<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
			<div class="pswp__ui pswp__ui--hidden">

				<div class="pswp__top-bar">

					<!--  Controls are self-explanatory. Order can be changed. -->

					<div class="pswp__counter"></div>

					<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

					<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

					<!-- Preloader -->
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>

				<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>

				<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>
		</div>
	</div>

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