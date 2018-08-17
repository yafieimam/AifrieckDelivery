<!DOCTYPE html>
<html lang="en">
<head>
	<?php
    session_start();
    include 'fbconfig.php';
    // include 'gpconfig.php';
	include 'user.php';
	?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Aifrieck Delivery</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link Shref="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img style="width:130px" src="images/home/logo1.png" alt="" /></a>
						</div>

					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php
				                if(isset($_SESSION['username']))
				                {
				                    if($_SESSION['level'] == "admin"){
				                        header('location:admin/index.php');
				                    }else if($_SESSION['level'] == "user"){
				                ?>
								<li><a href="profile.php"><i class="fa fa-user"></i>Edit Profile (<?php echo $_SESSION['fullname']; ?>)</a></li>
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
								<?php
									}
								}else if(isset($accessToken)){
									if(isset($_SESSION['facebook_access_token'])){
								        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
								    }else{
								        // Put short-lived access token in session
								        $_SESSION['facebook_access_token'] = (string) $accessToken;
								        
								          // OAuth 2.0 client handler helps to manage access tokens
								        $oAuth2Client = $fb->getOAuth2Client();
								        
								        // Exchanges a short-lived access token for a long-lived one
								        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
								        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
								        
								        // Set default access token to be used in script
								        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
								    }
								    
								    // Redirect the user back to the same page if url has "code" parameter in query string
								    if(isset($_GET['code'])){
								        header('Location: ./');
								    }
								    
								    // Getting user facebook profile info
								    try {
								        $profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture');
								        $fbUserProfile = $profileRequest->getGraphNode()->asArray();
								    } catch(FacebookResponseException $e) {
								        echo 'Graph returned an error: ' . $e->getMessage();
								        session_destroy();
								        // Redirect user back to app login page
								        header("Location: ./");
								        exit;
								    } catch(FacebookSDKException $e) {
								        echo 'Facebook SDK returned an error: ' . $e->getMessage();
								        exit;
								    }
								    
								    // Initialize User class
								    $user = new User();
								    
								    // Insert or update user data to the database
								    $fbUserData = array(
								        'oauth_provider'=> 'facebook',
								        'oauth_uid'     => $fbUserProfile['id'],
								        'first_name'    => $fbUserProfile['first_name'],
								        'last_name'     => $fbUserProfile['last_name'],
								        'email'         => $fbUserProfile['email'],
								        'gender'        => $fbUserProfile['gender'],
								        'locale'        => $fbUserProfile['locale'],
								        'picture'       => $fbUserProfile['picture']['url'],
								        'link'          => $fbUserProfile['link']
								    );
								    $userData = $user->checkUser($fbUserData);
								    
								    // Put user data into session
								    $_SESSION['userData'] = $userData;

								    // Get logout url
    								$logoutURL = $helper->getLogoutUrl($accessToken, $redirectURL.'logout.php');
    								if(!empty($userData)){
								?>
									<li><a href="profile.php"><i class="fa fa-user"></i>Edit Profile (<?php echo $userData['first_name'].' '.$userData['last_name']; ?>)</a></li>
									<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
									<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
									<li><a href="<?php echo $logoutURL; ?>"><i class="fa fa-lock"></i> Logout</a></li>
								<?php
								}
								}else{
								?>
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Order<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Menu Makanan</a></li>
										<?php
						                if(isset($_SESSION['username']))
						                {
						                    if($_SESSION['level'] == "admin"){
						                        header('location:admin/index.php');
						                    }else if($_SESSION['level'] == "user" ){
						                ?>
										<li><a href="checkout.php">Checkout</a></li> 
										<li><a href="cart.php">Cart</a></li> 
										<?php
											}
										}else if(isset($accessToken)){
										?>
										<li><a href="checkout.php">Checkout</a></li> 
										<li><a href="cart.php">Cart</a></li> 
										<?php
										}
										?>
                                    </ul>
                                </li> 
                                <?php
						        if(isset($_SESSION['username']))
						        {
						            if($_SESSION['level'] == "admin"){
						                header('location:admin/index.php');
						            }else if($_SESSION['level'] == "user"){
						        ?>
								<li><a href="contact-us.php">Lacak Pesanan</a></li>
								<?php
									}
								}else if(isset($accessToken)){
								?>
								<li><a href="contact-us.php">Lacak Pesanan</a></li>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
								<form name="form" action="" method="get" >
								 <input type="text" name="pencarian" id="pencarian" placeholder="Search" style="width:250px; background-position:225px; outline:medium none; padding-left:10px;" onkeypress="handle(event)" onfocusout="hideSearch1()"/>
								 <ul id="hasil" style="display:none; background:#F0F0E9; border:medium none;">
									<li><a href="product-details.php?id=21">Paket Kombo Ayam</a></li>
									<li><a href="product-details.php?id=22">Paket Kombo Burger</a></li>
							 		<li><a href="product-details.php?id=23">Paket Panas</a></li>
						         	<li><a href="product-details.php?id=24">Paket Super Besar</a></li>
						         	<li><a href="product-details.php?id=25">Paket Super Family</a></li>
						         	<li><a href="product-details.php?id=26">Paket Superstar</a></li>
								 </ul>
								</form>
								 <script type="text/javascript">

								function handle(e){
									if(e.keyCode === 13){
										e.preventDefault();
										document.getElementById("hasil").style.display = "block";
									}
								}

								// function hideSearch1() {
							 //    	document.getElementById("hasil").style.display = "none";
								// }
						    </script>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="proses.php" method="post">
							<input type="text" name="username" placeholder="Username" />
							<input type="password" name="password" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Login</button>
							<br>
							<?php
							$loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
							$output = '<a class="btn" style="background:#FE980F; font-color:white;" href="'.htmlspecialchars($loginURL).'">Login with Facebook</a>';
					    	echo $output;
					    	// $authUrl = $gClient->createAuthUrl();
    						// $output2 = '<a class="btn" style="background:#FE980F; font-color:white;" href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">Login with Google</a>';
					    	// echo $output2;
					    	?>
						</form>
					</div><!--/login form-->
				</div>
				<!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
				</fb:login-button> -->
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="proses_signup.php" method="post">
							<input type="text" name="username" placeholder="Username" required/>
							<input type="text" name="fullname" placeholder="Full Name" required/>
							<input type="email" name="email" placeholder="Email Address" required/>
							<input type="password" name="password" placeholder="Password" required/>
							<input type="hidden" name="level" value="user" required/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	<footer id="footer"><!--Footer-->
		<div class="footer-widget" >
			<div class="container" >
					<div class="col-sm-2" >
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Us</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
							</ul>
						</div>
					</div>
			</div>
		</div>

		<div class="footer-bottom">
		</div>
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>