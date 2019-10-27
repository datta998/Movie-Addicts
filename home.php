<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Movie Addicts</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
		
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="homepage">
	<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<div align="right">Welcome <strong><?php echo $_SESSION['username']; ?></strong></div>
    	<div align="right"> <a href="index.php?logout='1'" style="color: Bold Grey;"><h6>Logout<h6></a> </div>
    <?php endif ?>
	</div>

		<!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="#" id="logo">Movie Addicts</a></h1>
					
					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="home.php">Home</a></li>
								<li>
									<a href="">Featured List</a>
									<ul>
										<li><a href="new_release_fetch.php">New Released</a></li>
										<li><a href="top_rated_fetch.php">Top rated Movies</a></li>
										<li><a href="genre.php">Genre Based</a></li>
									</ul>
								</li>
								<li><a href="">Our Database</a>
									<ul>
										<li><a href="allmov.php">Movies</a></li>
										<li><a href="allact.php">Actors</a></li>
										<li><a href="alldir.php">Directors</a></li>
									</ul>
								</li>
                                <li><a href="dashboard.php">Dashboard</a></li>
							</ul>
						</nav>


					<!-- Banner -->
						<div id="banner">
							<div class="container">
								<section>
									<header class="major">
										<h2>Welcome to Movie Addicts!</h2>
										<span class="byline">Addict to your favorite movies,Explore movie by Genre, Top rating,New released </span>
									</header>
									<!-- <a href="#" class="button alt">Sign Up</a> -->
								</section>			
							</div>
						</div>

				</div>
			</div>

		<!-- Featured -->
			<div class="wrapper style2">
				<section class="container">
					<header class="major">
						<h2>Movies</h2>
					</header>
					<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="width:50%">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
	  <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
	  <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
	  <a href="kannada.php"><img src="images/kgf.jpg" alt="not able to load" href=kannada.php style="width:100%;"></a>
        <div class="carousel-caption">
		<a href="kannada.php" style="color: #fff;"><h3>Kannada</h3></a>
          
        </div>
      </div>

      <div class="item">
	  <a href="tamil.php"><img src="images/bigil.jpg" alt="not able to load" style="width:100%;"></a>
        <div class="carousel-caption">
		<a href="tamil.php" style="color: #fff;"><h3>Tamil</h3></a>
          
        </div>
      </div>
    
      <div class="item">
	  <a href="telugu.php"><img src="images/sarileru neekevvaru.jpg" alt="not able to load" style="width:100%;"></a>
        <div class="carousel-caption">
		<a href="telugu.php" style="color: #fff;"><h3>Telugu</h3></a>
	    </div>
      </div>
	  <div class="item">
	  <a href="hindi.php"><img src="images/housefull 4.jpg" alt="not able to load" style="width:100%;"></a>
        <div class="carousel-caption">
		<a href="hindi.php" style="color: #fff;"><h3>Hindi</h3></a>
		</div>
      </div>

		<div class="item">
	  <a href="english.php"><img src="images/joker.jpg" alt="not able to load" style="width:100%;"></a>
        <div class="carousel-caption">
		<a href="english.php" style="color: #fff;"><h3>English</h3></a>
		</div>
      </div>

		<div class="item">
	  <a href="malayalam.php"><img src="images/love action drama.jpg" alt="not able to load" style="width:100%; height:100%"></a>
        <div class="carousel-caption">
		<a href="malayalam.php" style="color: #fff;"><h3>Malayalam</h3></a>
		</div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>

					</div>
				</section>
			</div>
	</body>
</html>


