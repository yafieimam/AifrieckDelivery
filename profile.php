<?php
session_start();
include "cek_session.php";
include "conn.php";
include 'fbconfig.php';
include 'user.php';
if(isset($_GET['id_user'])){
    	$id_user=$_GET['id_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edit Profile | Aifrieck Delivery</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
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
								<li><a href="profile.php?id_user=<?php echo $_SESSION['id_user']; ?>"><i class="fa fa-user"></i>Edit Profile (<?php echo $_SESSION['fullname']; ?>)</a></li>
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
									<li><a href="profile.php?id_user=<?php echo $_SESSION['id_user']; ?>"><i class="fa fa-user"></i>Edit Profile (<?php echo $userData['first_name'].' '.$userData['last_name']; ?>)</a></li>
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

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Edit Profile</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="payment-options">
				<div class="row">
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Edit Profile</p>
							<div class="form-one">
								<form id="form-alamat" action="editprofile.php" method="post">
									<?php
									if(isset($_SESSION['username']))
				                	{
			                		    $hasil=  mysqli_query($connect, "SELECT * FROM user WHERE id_user='$id_user'");
									    if(!$hasil){
									        die("PERMINTAAN QUERY GAGAL");
									    }
									    while($baris=mysqli_fetch_array($hasil))
                						{
                						?>
                						ID USER : <input type="text" name="id_user" value="<?php echo $baris['id_user']; ?>" readonly>
										USERNAME : <input type="text" name="username" placeholder="Username" style="width:300px;" value="<?php echo $baris['username']; ?>">
										PASSWORD LAMA : <input type="password" name="password_lama" placeholder="Password Lama" style="width:300px;">
										PASSWORD BARU : <input type="password" name="password_baru" placeholder="Password Baru" style="width:300px;">
										CONFIRM PASSWORD : <input type="password" name="confirm_password_baru" placeholder="Confirm Password Baru" style="width:300px;">
										FULLNAME : <input type="text" name="fullname" placeholder="Full Name" style="width:300px;" value="<?php echo $baris['fullname']; ?>">
										EMAIL : <input type="text" name="email" placeholder="Email" style="width:300px;" value="<?php echo $baris['email']; ?>">
                						<?php
                						}
				                	}else if(isset($accessToken)){
			                		    $hasil2=  mysqli_query($connect, "SELECT * FROM users WHERE oauth_uid='$id_user'");
									    if(!$hasil2){
									        die("PERMINTAAN QUERY GAGAL");
									    }
									    while($baris2=mysqli_fetch_array($hasil2))
                						{
                						?>
                						ID USER : <input type="text" name="oauth_uid" value="<?php echo $baris2['oauth_uid']; ?>" readonly>
										FIRST NAME : <input type="text" name="first_name" placeholder="First Name" style="width:300px;" value="<?php echo $baris2['first_name']; ?>">
										LAST NAME : <input type="text" name="last_name" placeholder="Last Name" style="width:300px;" value="<?php echo $baris2['last_name']; ?>">
										EMAIL : <input type="text" name="email" placeholder="Email" style="width:300px;" value="<?php echo $baris2['email']; ?>">
                						<?php
                						}
				                	}
									?>
									
									<br><input type="submit" style="width:100px;">
								</form>
							</div>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

	

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
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php
}else{
    echo "Redirecting......";
                echo "<script>
                function kembali()
                {
                alert(\"Data Anda Belum Bisa Di Update, Periksa Kembali!!\");
                location.href='index.php';
                }   
                kembali();
                </script>";
                exit;
}
?>