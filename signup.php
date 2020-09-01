<?php
    require_once "includes/db_config.php";
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
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dajana Nimcevic">
	<title>MovieStar | Sign up</title>

</head>
<body class="body">

	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- registration form -->
						<form action="signup.php" class="sign__form" method="post" name="registration-form" id="registration-form">
							<a href="index.php" class="sign__logo">
								<img src="img/movielogo1.png" alt="">
							</a>
                            <small class="text-danger" id="username-message"></small>
							<div class="sign__group">
                                <label for="username"></label>
								<input name="username" id="username" type="text" class="sign__input" placeholder="Username">
							</div>
                            <small class="text-danger" id="email-message"></small>
							<div class="sign__group">
                                <label for="email"></label>
								<input name="email" id="email" type="text" class="sign__input" placeholder="Email">
							</div>
                            <small class="text-danger" id="password1-message"></small>
							<div class="sign__group">
                                <label for="password1">
								<input name="password1" id="password1" type="password" class="sign__input" placeholder="Password">
							</div>
                            <small class="text-danger" id="password2-message"></small>
                            <div class="sign__group">
                                <label for="password2">
                                <input name="password2"  id="password2" type="password" class="sign__input" placeholder="Confirm your password">
                            </div>
							<button name="submit" class="sign__btn" type="submit">Sign up</button>
                            <div class="alert" id="ajax-message"></div>

							<span class="sign__text">Already have an account? <a href="signin.php">Sign in!</a></span>
						</form>
                        <?php
                        $nav = 0;
                        if(isset($_GET['nav']))
                            $nav = $_GET['nav'];
                        switch ($nav){
                            case 0:
                            default: echo "";
                                break;
                            case 1: echo "<span> Username already exists !</span>";
                                break;
                            case 2: echo "<span> The passwords don't match !</span>";
                                break;
                            case 3: echo "<span> Check username and password !</span>";
                                break;
                        }
                        ?>
						<!-- registration form -->
					</div>
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
    <script>

        $('form').on('submit',function (e) {
            e.preventDefault();
            if(validateForm()){
                sendAjax(e.currentTarget);
            }
        })
        function validateForm() {

            var $inputs = $('input');
            var $messages = $('small');
            var isValid = true;

            for(var i=0; i<$inputs.length; i++){

                console.log($inputs[i]);
                if($inputs[i].value.trim() === '') {
                    $inputs[i].classList.add('error');
                    $messages[i].innerHTML = 'This field is required!';
                    isValid = false;
                } else {
                    $inputs[i].classList.remove('error');
                    $inputs[i].classList.add('success');
                    $messages[i].innerHTML = '';
                }
            }

            var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(!regex.test($inputs[1].value)) {
                $inputs[1].classList.remove('success');
                $inputs[1].classList.add('error');
                $messages[1].innerHTML = 'Please enter valid e-mail address!';
                isValid = false;
            } else {
                $inputs[1].classList.remove('error');
                $inputs[1].classList.add('success');
                $messages[1].innerHTML = '';
            }

            if($inputs[2].value !== $inputs[3].value){
                $inputs[2].classList.remove('success');
                $inputs[2].classList.add('error');
                $inputs[3].classList.remove('success');
                $inputs[3].classList.add('error');
                $messages[2].innerHTML = 'Passwords do not match!';
                isValid = false;
            }

            return isValid;
        }
        function sendAjax(data) {

            var username = data[0].value;
            var email = data[1].value;
            var password = data[2].value;
            var ajaxMessage = document.querySelector('#ajax-message');
            var form  = document.getElementById('registration-form');

            $.ajax({
                url: 'includes/register.inc.php',
                type: 'POST',
                data: 'username='+username+'&email='+email+'&password='+password+'&js='+1,
                success: function (response) {

                    if(response.error) {
                        ajaxMessage.classList.remove('alert-success');
                        ajaxMessage.classList.add('alert-danger');
                        ajaxMessage.innerHTML = response.error;

                    } else {
                        ajaxMessage.classList.remove('alert-danger');
                        ajaxMessage.classList.add('alert-success');
                        ajaxMessage.innerHTML = response.success;
                        form.reset();
                    }
                }
            })
        }


    </script>
</body>

</html>