<!DOCTYPE HTML>
<html>
	<head>
		<title>Movie Addicts</title>
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
	<body class="homepage">
	<div class="content">
  
		<!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="#" id="logo">Movie Addicts</a></h1>
					
					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="../home.php">Home</a></li>
								<li>
									<a href="">Featured List</a>
									<ul>
										<li><a href="../new_release_fetch.php">New Released</a></li>
									
										<li><a href="../top_rated_fetch.php">Top rated Movies</a></li>
									</ul>
								</li>
							
                                
							</ul>
						</nav>


					<!-- Banner -->
						
            
           
				</div>
        
			</div>
      <div class="wrapper style2" style="background: #333333 url(Images/background.png)";>
			        	<section class="container">		
                <section class="4u">
                  <a href="" class="image feature"><img src="images/kgf.jpg" alt=""></a>
                  <h2>KGF Chapter-1</h2>
						    </section>
                </section>
                <?php
/* Attempt MySQL server connection.*/
include('../dbconnect.php');

// initializing variables
$movie_id = array(); 
$x = 0;
$y = 0;

 
// Attempt select query execution
$sql = "SELECT m.movie_id, m.movie_name, m.movie_year, m.movie_language, m.plot, m.genre, m.prating, m.director_id, m.actor_id, a.actor_name, d.director_name FROM movie m,actor a,director d where m.actor_id=a.actor_id and m.director_id=d.director_id and m.movie_id=202";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class=rwd-table>";
            echo "<tr>";    
                echo "<th><b>Title</b></th>";
                echo "<th><b>Release year</b></th>"; 
                echo "<th><b>Actor</b></th>";
                echo "<th><b>Director</b></th>"; 
                echo "<th><b>Language</b></th>";
                echo "<th><b>Storyline</b></th>";
                echo "<th><b>Genre</b></th>";
                echo "<th><b>Rating</b></th>";
               
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
			    $movie_id[$x]=$row['movie_id'];
				$x++;
                echo "<td ><a href=moviedetail.php?varname=$movie_id[$y] TITLE='Click to review the movie'>" . $row['movie_name'] . "</a></td>";
				$y++;
                echo "<td>" . $row['movie_year'] . "</td>";
                echo "<td>" . $row['actor_name'] . "</td>";
                echo "<td>" . $row['director_name'] . "</td>";
                echo "<td>" . $row['movie_language'] . "</td>";
                echo "<td>" . $row['plot'] . "</td>";
                echo "<td>" . $row['genre'] . "</td>";
                echo "<td>" . $row['prating'] . "</td>";
                

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
			

            </div>

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
