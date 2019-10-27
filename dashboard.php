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
		<title>Dashboard</title>
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
    	<!--<div align="right"> <a href="index.php?logout='1'" style="color: Bold Grey;"><h6>Logout<h6></a> </div>-->
    <?php endif ?>
	</div>	

	<!-- notification message -->
  	<?php if (isset($_SESSION['success2'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success2']; 
          	unset($_SESSION['success2']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
	
		<!-- Header -->
			<div id="header">
				<div class="container">
				
					<!-- Logo -->
						<h1><a href="#" id="logo">Dashboard</a></h1>
					
					<nav id="nav">
							<ul>
								<li><a href="home.php">Home</a></li>
								<li>
									<a href="">Actions</a>
									<ul>
										<li><a href="deluser.php" onclick="return confirm('This can\'t be Undone!');">Delete Account</a></li>
										<li><a href="index.php?logout='1'" onclick="return confirm('Are You Sure?');" style="color: Bold Grey;">Logout</a></li>
									</ul>
								</li>
							</ul>
						</nav>

				</div>
			</div>

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<div class="container">
					<section>
						<header class="major">
							<h2>Dashboard</h2>
							<span class="byline">My Reviews (To edit go to details page of the Movie, Corresponding link given with your Review)</span>
							<?php
/* Attempt MySQL server connection.*/
include('dbconnect.php');

// initializing variables
$movie_id = array(); 
$x = 0;
$y = 0;
$uname1 = $_SESSION['username'];
 
// Attempt select query execution
$sql = "SELECT r.movie_id,m.movie_name,r.num_rating,r.r_data from movie m,review r where m.movie_id=r.movie_id and username='$uname1'";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class=rwd-table>";
            echo "<tr>";    
                echo "<th><b>Movie</b></th>";
                echo "<th><b>Rating</b></th>"; 
                echo "<th><b>Review</b></th>";
                
               
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
			    $movie_id[$x]=$row['movie_id'];
				$x++;
                echo "<td ><a href=moviedetail.php?varname=$movie_id[$y] TITLE='Click to review the movie'>" . $row['movie_name'] . "</a></td>";
				$y++;
                echo "<td>" . $row['num_rating'] . "</td>";
                echo "<td>" . $row['r_data'] . "</td>";
                

                echo "</tr>";                
			
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
 
// Close connection
mysqli_close($db);
?>
							</header>
					</section>
					<?php
							include('dbconnect.php');
						
					        $sql = "SELECT m.movie_id, m.movie_name, r.r_data, r.num_rating from users u, review r, movies m where u.username='$_SESSION[username]' AND u.id=r.id AND m.movie_id=r.movie_id";
							if($result = mysqli_query($db, $sql)){
								  if(mysqli_num_rows($result) > 0){
							 while($row = mysqli_fetch_array($result)){
								$_SESSION['del']=$row['movie_id'];
								$movie_id=$_SESSION['del'];
								echo"<a href=moviedetail.php?varname=$movie_id><h3> ".$row['title']."</h3></a>"; 
								echo"<b> ".$row['num_rating']."/10 </b><br>"; 
								echo"<b> ".$row['r_data']."</b><br>";
								?><a href="rdel.php?del=<?php echo $movie_id; ?>" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</a><br><br><br><br><?php
								}
							}
						}
					?>
	</body>
</html>
<style>
@import "https://fonts.googleapis.com/css?family=Montserrat:300,400,700";
.rwd-table {
  margin: 1em 0;
  min-width: 300px;
}
.rwd-table tr {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}
.rwd-table th {
  display: none;
}
.rwd-table td {
  display: block;
}
.rwd-table td:first-child {
  padding-top: .5em;
}
.rwd-table td:last-child {
  padding-bottom: .5em;
}
.rwd-table td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 6.5em;
  display: inline-block;
}
@media (min-width: 480px) {
  .rwd-table td:before {
    display: none;
  }
}
.rwd-table th, .rwd-table td {
  text-align: left;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    display: table-cell;
    padding: .25em .5em;
  }
  .rwd-table th:first-child, .rwd-table td:first-child {
    padding-left: 0;
  }
  .rwd-table th:last-child, .rwd-table td:last-child {
    padding-right: 0;
  }
}
.rwd-table {
  background: #34495E;
  color: #fff;
  border-radius: .4em;
  overflow: hidden;
}
.rwd-table tr {
  border-color: #46637f;
}
.rwd-table th, .rwd-table td {
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    padding: 1em !important;
  }
}
.rwd-table th, .rwd-table td:before {
  color: #dd5;
}

</style>
