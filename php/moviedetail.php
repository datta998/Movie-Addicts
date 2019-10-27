<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../index.php");
  }
?>
<!DOCTYPE HTML>
<html>
	<head>
	<style>
	@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }


/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
	</style>
		<title>Movie Details</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
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
	<body class="no-sidebar">

				    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<div align="right"><strong><?php echo $_SESSION['username']; ?></strong></div>
    	<div align="right"> <a href="../index.php?logout='1'" style="color: Bold Grey;"><h6>Logout<h6></a> </div>
    <?php endif ?>
	</div>	
	
	
	<!-- notification message -->
  	<?php if (isset($_SESSION['success1'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success1']; 
          	unset($_SESSION['success1']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

		<!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="#" id="logo">Review The Movie</a></h1>
					
					<nav id="nav">
							<ul>
								<li><a href="../home.php">Home</a></li>
							</ul>
						</nav>

				</div>
			</div>

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<div class="container">
					<section>
						<header class="major">
						<?php
							include('../dbconnect.php');
							$movie_id = $_GET['varname'];
							$_SESSION['movie_id'] = $movie_id;	
							// initializing variables
							  
							   $x = 0;
							   $y = 0;
														
							$sql = "SELECT m.movie_name,m.genre,m.movie_year, movie_language, prating FROM movie m  WHERE m.movie_id='$movie_id'";
							if($result = mysqli_query($db, $sql)){
								  if(mysqli_num_rows($result) > 0){
							  $row = mysqli_fetch_array($result);
							  echo"<h2>" . $row['movie_name'] . "</h2>";
							  echo"<b><a href='../poster.php?movie_id=$movie_id'>Click Here to View Poster</a></b><br><br>";
							  echo"<h3>Release year : ". $row['movie_year'] . " </h3>";
							  echo"<h3>Rating : " . $row['prating'] . "</h3>";
							  echo"<br>";
							  echo"<h4>Genre : " . $row['genre'] . "</h4>";
							  
							  
							    }
							}
							  ?>
							  <br><br>
							  <div id="revinp">
							  <form method="post" action="rstore.php">
							  <fieldset class="rating">
									<input type="radio" id="star10" name="rating" value=10.0 /><label class = "full" for="star10" title="Century Best - 10 stars"></label>
									<input type="radio" id="star9half" name="rating" value=9.5 /><label class = "half" for="star9half" title="Awesome - 9.5 stars"></label>
									<input type="radio" id="star9" name="rating" value=9.0 /><label class = "full" for="star9" title="Awesome - 9 stars"></label>
									<input type="radio" id="star8half" name="rating" value=8.5 /><label class = "half" for="star8half" title="Awesome - 8.5 stars"></label>
									<input type="radio" id="star8" name="rating" value=8.0 /><label class = "full" for="star8" title="Awesome - 8 stars"></label>
									<input type="radio" id="star7half" name="rating" value=7.5 /><label class = "half" for="star7half" title="Awesome - 7.5 stars"></label>
									<input type="radio" id="star7" name="rating" value=7.0 /><label class = "full" for="star7" title="Awesome - 7 stars"></label>
									<input type="radio" id="star6half" name="rating" value=6.5 /><label class = "half" for="star6half" title="Awesome - 6.5 stars"></label>
									<input type="radio" id="star6" name="rating" value=6.0 /><label class = "full" for="star6" title="Awesome - 6 stars"></label>
									<input type="radio" id="star5half" name="rating" value=5.5 /><label class = "half" for="star5half" title="Awesome - 5.5 stars"></label>
									<input type="radio" id="star5" name="rating" value=5.0 /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
									<input type="radio" id="star4half" name="rating" value=4.5 /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
									<input type="radio" id="star4" name="rating" value=4.0 /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
									<input type="radio" id="star3half" name="rating" value=3.5 /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
									<input type="radio" id="star3" name="rating" value=3.0 /><label class = "full" for="star3" title="Meh - 3 stars"></label>
									<input type="radio" id="star2half" name="rating" value=2.5 /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
									<input type="radio" id="star2" name="rating" value=2.0 /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
									<input type="radio" id="star1half" name="rating" value=1.5 /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
									<input type="radio" id="star1" name="rating" value=1.0 /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
									<input type="radio" id="starhalf" name="rating" value=0.5 /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
							  </fieldset>
							  <input type="text" name="Review" placeholder="Type Your Review Here">
							  <p></p>
							  <input type="submit" name="RStore">
							  <input type="reset" name="Reset">
							  </form>
							  </div>
							  
							  
							<span class="byline"></span>
						</header>
						</section>
				</div>
			</div>
	</body>
</html>